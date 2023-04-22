#include <ESP8266WiFi.h>
#include <WiFiClient.h>

/* WiFi*/
char ssid[] = "your_network_ssid"; 
char password[] = "your_network_password";

const char* host = "machine_ip"; //IP of the machine with the data storage system

#define sensor A0 // soil moisture sensor
const byte relayState = D8; // relay
const byte ledG = D0; // green led 
const byte ledY = D1; // yellow led
const byte ledR = D2; // red led
const byte ledB = D3; // blue led

int moisture;

unsigned long previousTime = 0;
unsigned long period = 3600000;

void setup() { 

  pinMode(sensor, INPUT);
  pinMode(relayState, OUTPUT);
  pinMode(ledG, OUTPUT);
  pinMode(ledY, OUTPUT);
  pinMode(ledR, OUTPUT);
  pinMode(ledB, OUTPUT);
  
  Serial.begin(9600);
  delay(10);
  
  conectaWiFi(ssid, password);

  digitalWrite(relayState, HIGH);

}

void loop() { 

  moisture = analogRead(sensor);                    
  moisture = map(moisture, 1024, 0, 0, 100); 

  if (moisture <= 40) {  
    digitalWrite(ledR, HIGH);
    digitalWrite(ledB, HIGH);
    digitalWrite(ledG, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(relayState, LOW);
    delay(6000);
    digitalWrite(relayState, HIGH);
    digitalWrite(ledB, LOW);
    delay(3000);
  }

  else if ((moisture >= 50) && (moisture < 60)){ 
    digitalWrite(ledR, LOW);
    digitalWrite(ledG, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(relayState, HIGH);
  }

  else if((moisture >= 60) && (moisture < 80)) { 
    digitalWrite(ledG, HIGH);
    digitalWrite(ledR, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(relayState, HIGH);
  }

  else if(moisture >= 80){ 
    digitalWrite(ledR, HIGH);
    digitalWrite(ledG, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(relayState, HIGH);
    delay(200);
    digitalWrite(ledR, LOW);
    delay(200);
  }

  sendData();
  
}

void sendData() {

  unsigned long currentTime = millis();
  
  if(currentTime - previousTime >= period){
    
    previousTime = currentTime;
    /*----------------- Enviando os dados para a aplicaçao web -----------------*/
    Serial.print("connecting to ");
    Serial.println(host);
  
    // Use WiFiClient class to create TCP connections
    WiFiClient client;
  
    const int port = 80;
    if (!client.connect(host, port)) {
      Serial.println("connection fail");
      return;
    }
  
    String url = "/salvar.php?";
      url += "moisture=";
      url += moisture;
  
    Serial.print("Requesting URL: ");
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
    Serial.println("completed connection");
    Serial.println();
    Serial.println();
    
    client.stop();

    delay(10);
  }
}
 
void conectaWiFi(char SSID[], char PASSWORD[]){

  Serial.print("connecting to network: ");
  Serial.println(SSID);

  WiFi.begin(SSID, PASSWORD);

  while(WiFi.status() != WL_CONNECTED ){
    delay(500);
    Serial.print(".");
  }

  Serial.println(" ");
  Serial.println("Connected!");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println("-------------------- x --------------------");
  Serial.println(" ");
}