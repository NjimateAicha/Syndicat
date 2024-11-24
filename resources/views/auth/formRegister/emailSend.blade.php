<!-- resources/views/emails/form_submission.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

    <!-- Title of the App -->
    <div style="text-align: center; background-color: #2044ac; color: #fff; padding: 20px;">
        <h1>Bayticare</h1>
    </div>

    <!-- Container for the form submission -->
    <div style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333;">New Form Submission  {{ $data['first_name'] }} {{ $data['last_name'] }}</h2>

        <p><strong>Prénom:</strong> {{ $data['first_name'] }}</p>
        <p><strong>Nom:</strong> {{ $data['last_name'] }}</p>
        <p><strong>Numéro de téléphone:</strong> {{ $data['phone'] }}</p>
        <p><strong>Adresse E-mail:</strong> {{ $data['email'] }}</p>
        <p><strong>Adresse:</strong> {{ $data['address'] }}</p>
        <p><strong>Numéro d'immeuble:</strong> {{ $data['building_number'] }}</p>
        <p><strong>Numéro d'appartement:</strong> {{ $data['apartment_number'] }}</p>

        <p><strong>Conditions accepted:</strong> {{ $data['terms'] ? 'Yes' : 'No' }}</p>
    </div>

</body>
</html>
