<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.2.0/crypto-js.min.js" integrity="sha512-a+SUDuwNzXDvz4XrIcXHuCf089/iJAoN4lmrXJg18XnduKK6YlDHNRalv4yd1N40OKI80tFidF+rqTFKGPoWFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
    <script>
        const client_id = 'CK-d18b3dbd-8c0a-4284-bd8e-084935cb8698';
        const secret_key = 'SK-d82ac1e9-bf40-48ff-bc67-fbc4f7290dc2';
        const iso_timestamp = new Date().toISOString();
        const body = {
            "expired": "2024-12-25 11:12:00",
            "amount": 80000,
            "customer_phone": "081231857418",
            "customer_email": "pay@egate.id",
            "bank_code": "008",
            "customer_name": "Test Payment",
            "remark": "test satu",
            "url_callback": "http://test.com",
            "identifier_id": "170"
        }
        function createSignature(client_id, target, body, iso_timestamp, secret_key) {
            const raw_string_data = [
                `Client-Key:${client_id}`,
//                `Request-Timestamp:${iso_timestamp}`,
                `Request-Timestamp:2024-02-19T06:13:14.942Z`,
                `Request-Target:${target}`,
                `Digest:${CryptoJS.SHA256(body).toString(CryptoJS.enc.Base64)}`
            ];
            console.log('raw_string', raw_string_data.join('\n'));
            const signature = CryptoJS.HmacSHA256(raw_string_data.join('\n'), secret_key).toString(CryptoJS.enc.Hex);
            console.log('body', body);
            console.log('DigestHex', CryptoJS.SHA256(body).toString());
            console.log('Digest64', CryptoJS.SHA256(body).toString(CryptoJS.enc.Base64));
            console.log('signature', signature);
            return signature;
        }

        function generateSignature(jsonBody) {
            var tojson = JSON.parse(jsonBody);
            var jsonstring = JSON.stringify(tojson);
            return createSignature(client_id, '/partner/create/va', jsonstring, iso_timestamp, secret_key);
        }
        signature = generateSignature(JSON.stringify(body));
    </script>
</html>
