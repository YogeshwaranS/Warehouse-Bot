//SDA   Digital 10
//SCK   Digital 13
//MOSI  Digital 11
//MISO  Digital 12
//IRQ   unconnected
//GND   GND
//RST   Digital 9
//3.3V  3.3V
#include <SPI.h>
#include <MFRC522.h>
#include <SoftwareSerial.h>
SoftwareSerial sm(7, 8); // RX, TX
 char sL,sb;
 int sn= 0;
 int temp;
 String msg;
#define SS_PIN 10
#define RST_PIN 9
MFRC522 mfrc522(SS_PIN, RST_PIN);   // Create MFRC522 instance.
 String A ="45 D0 AE 75";
 String B ="123456789";
 int ledPin1= 3;
 int ledPinh = 2;//home led
 int ledPin2 = 4;
void setup() 
{
   Serial.begin(9600);   // Initiate a serial communication
   sm.begin(9600);
  SPI.begin();      // Initiate  SPI bus
  mfrc522.PCD_Init();   // Initiate MFRC522
 analogWrite(ledPin1, 0); analogWrite(ledPinh, 0); analogWrite(ledPin2, 0);
temp=0 ;
}
void loop() 
{  
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
      {
          return;
      }
          // Select one of the cards
  if ( ! mfrc522.PICC_ReadCardSerial()) 
      {
          return;
      }
                              
  msg="";
  sm.write("AT+CIPMUX=1\r\n");
  delay(1000);
  sm.write("AT+CIPSTART=0,\"TCP\",\"projectrfid.coolpage.biz\",80\r\n");
  delay(1000);
  sm.write("AT+CIPSEND=0,67\r\n"); 
  delay(1000);
  sm.write("GET /sendloc.php?loc=a HTTP/1.1\r\nHost: projectrfid.coolpage.biz\r\n\r\n");
  temp = sn;
while (sm.available()) {
            msg = sm.readString();Serial.print(msg);
            }
        if (msg.indexOf("+IPD,")>=0)
          {
            if (msg.indexOf("<body>")>=0)
            {
              sL = msg.charAt(msg.indexOf("$")+1);
               sb = msg.charAt(msg.indexOf("%")+1);
               sn= msg.charAt(msg.indexOf("#")+2);
            }
          }
          delay(6000);
if (!sn==temp)
{
         switch (sb){

            case 1: {
                                              
                          //Show UID on serial monitor
                          Serial.print("UID tag :");
                          String content= "";
                          byte letter;
                          for (byte i = 0; i < mfrc522.uid.size; i++) 
                          {
                             Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                             Serial.print(mfrc522.uid.uidByte[i], HEX);
                             content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
                             content.concat(String(mfrc522.uid.uidByte[i], HEX));
                          }
                        
                          Serial.println();
                          Serial.print("Message : ");
                          content.toUpperCase();
                          analogWrite(ledPinh, 0);//home led strip
                           if (content.substring(1) == A) //change here the UID of the card/cards that you want to give access
                          {
                           Serial.println("Authorized access");
                                  sm.write("AT+CIPMUX=1\r\n");delay(1000);
                                  sm.write("AT+CIPSTART=0,\"TCP\",\"projectrfid.coolpage.biz\",80\r\n");delay(1000);
                                  sm.write("AT+CIPSEND=0,67\r\n"); delay(1000);
                                  sm.write("GET /wificon.php?cid=A HTTP/1.1\r\nHost: projectrfid.coolpage.biz\r\n\r\n");
                                  while (sm.available())
                                        {
                                          msg = sm.readString();
                                          Serial.print(msg);
                                          }
                         delay (3000);
                           if(sL==1)
                                      {
                                       analogWrite(ledPinh, 250);
                                       analogWrite(ledPin1, 250);
                                       delay(6000);
                                        }
                                      else if (sL==2)
                                      {
                                      analogWrite(ledPinh, 250);
                                       analogWrite(ledPin1, 250);
                                      analogWrite(ledPin2, 250);
                                     delay(6000);
                                        }
                             }
                             else {
                              Serial.println("Unauthorized Access");
                              analogWrite(ledPinh, 0);
                              }
                         
                           delay(3000);
                                 
                                 break;
            }
                          case 2:
                          {
                          //Show UID on serial monitor
                          Serial.print("UID tag :");
                          String content= "";
                          byte letter;
                          for (byte i = 0; i < mfrc522.uid.size; i++) 
                          {
                             Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
                             Serial.print(mfrc522.uid.uidByte[i], HEX);
                             content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
                             content.concat(String(mfrc522.uid.uidByte[i], HEX));
                          }
                        
                          Serial.println();
                          Serial.print("Message : ");
                          content.toUpperCase();
                            analogWrite(ledPinh, 0);//home led strip
                          if (content.substring(1) == B) //change here the UID of the card/cards that you want to give access
                          {
                           Serial.println("Authorized access");
                                  sm.write("AT+CIPMUX=1\r\n");delay(1000);
                                  sm.write("AT+CIPSTART=0,\"TCP\",\"projectrfid.coolpage.biz\",80\r\n");delay(1000);
                                  sm.write("AT+CIPSEND=0,67\r\n"); delay(1000);
                                  sm.write("GET /wificon.php?cid=B HTTP/1.1\r\nHost: projectrfid.coolpage.biz\r\n\r\n");
                           delay (3000);
                           
                             if(sL==1)
                                      {
                                        analogWrite(ledPinh, 250);
                                        analogWrite(ledPin1, 250);
                                        delay(6000);
                                        }
                                      else if (sL==2)
                                      {
                                        analogWrite(ledPinh, 250);
                                        analogWrite(ledPin1, 250);
                                        analogWrite(ledPin2, 250);
                                        delay(6000);
                                        }
                             }

                             else {
                              Serial.println("Unauthorized Access");
                              analogWrite(ledPinh, 0);
                              }
                            
                           delay(3000);
                             break;
          
                          }
                  default:{
                             Serial.println("sb not defined");
                  }
          }
 
 
}
} 


