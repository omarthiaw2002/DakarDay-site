
<?php
// Clés API de TEST PayDunya
master_key = "**************************";private_key = "**************************";
public_key = "**************************";token = "**************************";

// Données de la facture
data = [
  "invoice" => [
    "items" => [[
      "name" => "Produit Exemple",
      "quantity" => 1,
      "unit_price" => 5000,
      "total_price" => 5000,
      "description" => "Un bon produit"
    ]],
    "total_amount" => 5000,
    "description" => "Achat sur DakarDay"
  ],
  "store" => [
    "name" => "DakarDay",
    "website_url" => "https://dakarday.com"
  ],
  "actions" => [
    "cancel_url" => "https://dakarday.com/echec.php",
    "return_url" => "https://dakarday.com/succes.php"
  ]
];

// Appel APIch = curl_init("https://app.paydunya.com/sandbox-api/v1/checkout-invoice/create");
curl_setopt(ch, CURLOPT_HTTPHEADER, [
  "Content-Type: application/json",
  "PAYDUNYA-MASTER-KEY:master_key",
  "PAYDUNYA-PRIVATE-KEY: private_key",
  "PAYDUNYA-PUBLIC-KEY:public_key",
  "PAYDUNYA-TOKEN: token"
]);
curl_setopt(ch, CURLOPT_POST, true);
curl_setopt(ch, CURLOPT_POSTFIELDS, json_encode(data));
curl_setopt(ch, CURLOPT_RETURNTRANSFER, true);response = curl_exec(ch);
curl_close(ch);result = json_decode(response, true);

if (isset(result['response_code'])result['response_code'] == "00") {
  header("Location: " . result['response_text']); // Redirige vers page de paiement
 else 
  echo "Erreur : " .result['response_text'];
}
?>
```