#define analSensor A0
#define rele 9
#define ledBlue 3
#define ledRed 4
#define ledYellow 5
#define ledGreen 6

double aSensor;

void setup() {
  pinMode(analSensor, INPUT);
  pinMode(rele, OUTPUT);
  pinMode(ledRed, OUTPUT);
  pinMode(ledYellow, OUTPUT);
  pinMode(ledGreen, OUTPUT);
  
  Serial.begin(9600);
}

void loop() {
  aSensor = analogRead(analSensor);
  
  Serial.print("Leitura do sensor Umidade: ");
  Serial.println(aSensor);

  if(aSensor > 700) {
    digitalWrite(ledRed, HIGH);
    digitalWrite(ledYellow, LOW);
    digitalWrite(ledGreen, LOW);
    digitalWrite(ledBlue, HIGH);
    digitalWrite(rele, LOW);
    delay(1500);
    digitalWrite(rele, HIGH);
    digitalWrite(ledBlue, LOW);
    delay(3000);
  }
  else if ((aSensor <= 600) && (aSensor > 400)){
    digitalWrite(ledYellow, HIGH);
    digitalWrite(ledRed, LOW);
    digitalWrite(ledGreen, LOW);
    digitalWrite(ledBlue ,LOW);
    digitalWrite(rele, HIGH);
  }
  else if((aSensor < 400) && (aSensor > 300)) {
    digitalWrite(ledGreen, HIGH);
    digitalWrite(ledYellow, LOW);
    digitalWrite(ledRed, LOW);
    digitalWrite(ledBlue ,LOW);
    digitalWrite(rele, HIGH);
  }
  else if(aSensor < 300){
    digitalWrite(ledGreen, HIGH);
    digitalWrite(ledRed, HIGH);
    digitalWrite(ledYellow, LOW);
    digitalWrite(ledBlue ,LOW);
    delay(200);
    digitalWrite(ledRed, LOW);
    delay(200);
  }
}
