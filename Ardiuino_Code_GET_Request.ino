#include <ESP8266WiFi.h>

const char* ssid     = "esdm";
const char* password = "12345678";
const char* host = "universalcard.000webhostapp.com";

char rfid[13];
char pin[5];
char cost[7];
char a;
int ct=0,ct1=0,ct2=0,ct3=0;

void setup() {
  Serial.begin(9600);
  delay(10);
  pinMode(2, OUTPUT);
  digitalWrite(2, LOW);
  // We start by connecting to a WiFi network
  
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  digitalWrite(2, HIGH); 
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  

}

int value = 0;

void loop() {
  //Serial.write("OK");
  delay(1000);
  ++value;

  Serial.print("connecting to ");
  Serial.println(host);
  
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  
  for(int j=0;j<7;j++)
  {cost[j] = '\0';}
  for(int j=0;j<13;j++)
  {rfid[j] = '\0';}
  for(int j=0;j<5;j++)
  {pin[j] = '\0';}
  
  ct=0,ct1=0,ct2=0,ct3=0;
  while(Serial.available()>0)
  {
    digitalWrite(2, HIGH);
    delay(100);
    digitalWrite(2, LOW);
    delay(100);
    
    a = (char)Serial.read();
    
    if(ct>=0 && ct<12)
    {
    rfid[ct1]=a;
    ct1++;
    }
    else if(ct>=12 && ct<16)
    {
      pin[ct2]=a;
      ct2++;
    }else if(ct>=1 && ct<22)
    {
      cost[ct3]=a;
      ct3++;
    }
    ct++;
  }
 // if(ct1 >= 12 && ct2 >= 4 && ct3 >0)
   // {
        rfid[ct1] = '\0';
        pin[ct2] = '\0';
        cost[ct3] = '\0';
      
        //server.send(200, "text/html", "<h1>You are connected</h1>"); 
        Serial.println(rfid);
        Serial.println(pin);
        Serial.println(cost);
        // We now create a URI for the request
        
       String url = "/pages/retailer/transaction.php";
        url += "?rfid=820039667AA7";
        //url += rfid;
        url += "&pin=5555";
        //url += pin;
        url += "&cost=45";
        //url += cost;
        
        Serial.print("Requesting URL: ");
        Serial.println(url);
        
        // This will send the request to the server
        client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                     "Host: " + host + "\r\n" + 
                     "Connection: close\r\n\r\n");
        unsigned long timeout = millis();
        while (client.available() == 0) {
          if (millis() - timeout > 5000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
          }
        }
        
        // Read all the lines of the reply from server and print them to Serial
        while(client.available()){
          String line = client.readStringUntil('\n');
          Serial.println(line);
          if(line.substring(0,7) == "Success")
          {
            Serial.write("Y");
          }else if(line.substring(0,6) == "Failed")
          {
            Serial.write("N");
          }else if(line.substring(0,4)=="User")
          {
            Serial.write("O");
          }
        }
        Serial.println();
        Serial.println("closing connection");
    //}
 
}
