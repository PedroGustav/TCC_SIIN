
#include <ESP8266WiFi.h>
#include<ESP8266HTTPClient.h>
#include<WiFiClient.h>

#ifndef STASSID
#define STASSID "INTELBRAS"
#define STAPSK  "a1b2c3d4"
#endif

const char* ssid     = STASSID;
const char* password = STAPSK;

const char* host = "10.0.0.36";


int sensor1 = 50;
int sensor2 = 60;
int sensor3 = 70;

void setup() {
  Serial.begin(9600);

  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  /* Explicitly set the ESP8266 to be a WiFi-client, otherwise, it by default,
     would try to act as both a client and an access-point and could cause
     network-issues with your other WiFi-devices on your WiFi-network. */
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  //============================================

  sensor1 += 2;
  sensor2 += 2;
  sensor3 += 2;

  //============================================
    
  Serial.print("connecting to ");
  Serial.println(host);

  // Use WiFiClient class to create TCP connections
  WiFiClient client;

  const int port = 80;
  if (!client.connect(host, port)) {
    Serial.println("connection failed");
    return;
  }

  String url = "/nodemcu/salvar.php?";
    url += "sensor1="; 
    url += sensor1;
    url += "&sensor2=";
    url += sensor2;
    url += "&sensor3=";
    url += sensor3;
    
  
  Serial.print("Requesting URL: ")  ;
  Serial.println(url);

  
  // This will send a string to the server
  Serial.println("sending data to server");
  client.println(String("GET ") + url + " HTTP/1.1\r\n" + 
                   "Host: " + host + "\r\n" +
                   "Connection: close\r\n\r\n");


  // wait for data to be available
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 5000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      delay(60000);
      return;
    }
  }

  // Read all the lines of the reply from server and print them to Serial
  Serial.println("receiving from remote server");
  // not testing 'client.connected()' since we do not need to send data here
  while (client.available()) {
    char ch = static_cast<char>(client.read());
    Serial.print(ch);
  }

  // Close the connection
  Serial.println();
  Serial.println("closing connection");
  client.stop();

  delay(5000); // execute once every 5 seconds, don't flood remote service
}
