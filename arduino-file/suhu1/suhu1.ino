#include <SPI.h>
#include <Ethernet.h>

// assign a MAC address for the ethernet controller.
// Newer Ethernet shields have a MAC address printed on a sticker on the shield
// fill in your address here:
byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED};

// fill in an available IP address on your network here,
// for manual configuration:
IPAddress ip(192,168,137,2);
// initialize the library instance:
EthernetClient client;

char server[] = "api.grupi.org";   

unsigned long lastConnectionTime = 0;       
boolean lastConnected = false;              
const unsigned long postingInterval = 60000;

int suhu = A1;
uint16_t suhu1; 
int adc = 0;

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);

//  analogReference(INTERNAL);
//  referenceVoltage = 1.1;

  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // DHCP failed, so use a fixed IP address:
    Ethernet.begin(mac, ip);
  }
}

void loop() {
  // if there's incoming data from the net connection.
  // send it out the serial port.  This is for debugging
  // purposes only:
  if (client.available()) {
    char c = client.read();
    Serial.print(c);
  }

  // if there's no net connection, but there was one last time
  // through the loop, then stop the client:
  if (!client.connected() && lastConnected) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
  }

  // if you're not connected, and ten seconds have passed since
  // your last connection, then connect again and send data:
  if(!client.connected() && (millis() - lastConnectionTime > postingInterval)) {
   adc = analogRead(suhu);
   suhu1 = (uint32_t)(adc*500)>>9;
   sendData(suhu1);
   Serial.println(suhu1);
  }
  // store the state of the connection for next time through
  // the loop:
  lastConnected = client.connected();
}

// this method makes a HTTP connection to the server:
void sendData(uint16_t thisData) {
  // if there's a successful connection:
  Serial.println(suhu1);
  String JsonData = "{\"token\":\"suhu\" ,\"sensor\": ";
  JsonData = JsonData + suhu1;
  JsonData = JsonData + "}";
  if (client.connect(server, 80)) {
    Serial.println("connecting...");
    // send the HTTP PUT request:
    client.println("POST /temp HTTP/1.1");
    client.println("Host: api.grupi.org");
    client.println("User-Agent: Arduino/1.0");
    client.println("Accept: application/json");
    client.print("Content-Length: ");
    client.println(JsonData.length());

    // last pieces of the HTTP PUT request:
    client.println("Content-Type: application/json");
    client.println("Connection: close");
    client.println();
    client.println(JsonData);
  } 
  else {
    // if you couldn't make a connection:
    Serial.println("connection failed");
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();
  }
   // note the time that the connection was made or attempted:
  lastConnectionTime = millis();
}
