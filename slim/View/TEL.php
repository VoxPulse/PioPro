<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Envoyer un SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        label {
            margin-top: 10px;
            display: block;
            color: #666;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Adds padding without increasing the width */
        }

        button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #004494;
        }
    </style>
</head>
<body>
    <form id="smsForm" action="SEND3.php">
        <h1>Envoyer un message</h1>
        <label for="phone">Numéro de téléphone:</label>
        <input type="tel" id="phone" name="phone" required placeholder="Entrez un numéro de téléphone">

        <label for="message">Message:</label>
        <textarea id="message" name="message" required placeholder="Votre message ici"></textarea>

        <button type="submit">Envoyer SMS</button>
    </form>

</body>
</html>
