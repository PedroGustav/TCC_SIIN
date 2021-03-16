#include <ESP8266WiFi.h>
#include <WiFiClient.h>

/* WiFi*/
char ssid[] = "FTTH JAILTON"; // Nome da Rede WiFi
char password[] = "afjo2811"; //Senha da Rede WiFi

const char* host = "192.168.100.50";

#define sensor A0 // sensor de umidade do solo
const byte estadoRele = D8; // rele
const byte ledG = D0; // Led verde 
const byte ledY = D1; // Led amarelo
const byte ledR = D2; // Led vermelho
const byte ledB = D3; // Led azul

int nivelUmidade;

void setup() { /*Funçao de declaçao de variaveis*/

  pinMode(sensor, INPUT);
  pinMode(estadoRele, OUTPUT);
  pinMode(ledG, OUTPUT);
  pinMode(ledY, OUTPUT);
  pinMode(ledR, OUTPUT);
  pinMode(ledB, OUTPUT);
  
  Serial.begin(9600);
  delay(10);
  
  conectaWiFi(ssid, password);

  digitalWrite(estadoRele, HIGH);

}

void loop() { /*Funçao onde fica as funcionalidades do sistema*/

  nivelUmidade = analogRead(sensor);
  nivelUmidade = map(nivelUmidade, 1024, 0, 0, 100); /*Convertendo de inteiro para porcentagem*/

  if (nivelUmidade <= 40) {  /*Se o nivel da umidade for menor/igual que 40%*/
    digitalWrite(ledR, HIGH);
    digitalWrite(ledB, HIGH);
    digitalWrite(ledG, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(estadoRele, LOW);
    delay(6000);
    digitalWrite(estadoRele, HIGH);
    digitalWrite(ledB, LOW);
    delay(3000);
  }

  else if ((nivelUmidade >= 50) && (nivelUmidade < 60)){ /*Se o nivel da umidade for maior/igual que 50% e menor que 60%*/
    digitalWrite(ledY, HIGH);
    digitalWrite(ledR, LOW);
    digitalWrite(ledG, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(estadoRele, HIGH);
  }

  else if((nivelUmidade >= 60) && (nivelUmidade < 80)) { /*Se o nivel da umidade for maior/igual que 60% e menor que 80%*/
    digitalWrite(ledG, HIGH);
    digitalWrite(ledR, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(estadoRele, HIGH);
  }

  else if(nivelUmidade >= 80){ /*Se o nivel da umidade for maior/igual que 80%*/
    digitalWrite(ledR, HIGH);
    digitalWrite(ledG, LOW);
    digitalWrite(ledY, LOW);
    digitalWrite(ledB, LOW);
    digitalWrite(estadoRele, HIGH);
    delay(200);
    digitalWrite(ledR, LOW);
    delay(200);
  }

  /*----------------- Enviando os dados para a aplicaçao web -----------------*/
    Serial.print("connecting to ");
    Serial.println(host);
  
    // Use WiFiClient class to create TCP connections
    WiFiClient client;
  
    const int port = 80;
    if (!client.connect(host, port)) {
      Serial.println("Conexao Falida");
      return;
    }
  
    String url = "/salvar.php?";
      url += "nivelUmidade=";
      url += nivelUmidade;
  
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
    Serial.println("Conexao fechada");
    Serial.println();
    Serial.println();
    
    client.stop();
    /*---------------------------------------------------------------------------*/
  
    delay(3000); // execute once every 6 seconds, don't flood remote service
  
}

void conectaWiFi(char SSID[], char PASSWORD[]){

  Serial.print("Conectando a rede ");
  Serial.println(SSID);

  WiFi.begin(SSID, PASSWORD);

  while(WiFi.status() != WL_CONNECTED ){
    delay(500);
    Serial.print(".");
  }

  Serial.println(" ");
  Serial.println("WiFi Conectado");
  Serial.println("Endereço de IP: ");
  Serial.println(WiFi.localIP());
  Serial.println("-------------------- x --------------------");
  Serial.println(" ");
}