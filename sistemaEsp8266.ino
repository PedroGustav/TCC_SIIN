#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

const byte rele = D0; //rele / válvula/ bomba
const byte sensor = D1; //sensor de umidade

bool estadoSensor;
bool estadoAnterior;


const byte ledR = D2; //Led Vermelho
const byte ledY = D3; //Led Amarelo
const byte ledG = D4; //Led Verde
const byte ledB = D5; //Led Azul

char ssid[] = "FTTH JAILTON";
char senha[] = "afjo2811";

void setup() {

  pinMode(sensor, INPUT);
  pinMode(rele, OUTPUT);

  pinMode(ledR, OUTPUT);
  pinMode(ledY, OUTPUT);
  pinMode(ledG, OUTPUT);
  pinMode(ledB, OUTPUT);

  digitalWrite(rele, HIGH);

  Serial.begin(115200);
  delay(10);

  conectaWiFi(ssid, senha);

}

void loop() {
  digitalWrite(rele, HIGH);
  estadoSensor = digitalRead(sensor);
  Serial.println(estadoSensor);
  if (estadoSensor == HIGH){
    digitalWrite(ledR, HIGH);
    digitalWrite(ledG, LOW);
  }
  else {
    digitalWrite(ledR, LOW);
    digitalWrite(ledG, HIGH);
  }

  if (estadoSensor && !estadoAnterior){
    delay(5000);
    digitalWrite(ledR, LOW);
    digitalWrite(ledY, HIGH);

    while(digitalRead(sensor)){
      digitalWrite(ledB, HIGH);
      digitalWrite(rele, LOW);
      delay(4000);
      digitalWrite(rele, HIGH);
      digitalWrite(ledB, LOW);
      delay(10000);
    }
    digitalWrite(ledY, LOW);
  }

  estadoAnterior = estadoSensor;
  
}

void conectaWiFi(char SSID[], char SENHA[]){

  Serial.print("Conectando a rede ");
  Serial.println(SSID);

  WiFi.begin(SSID, SENHA);

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