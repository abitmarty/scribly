<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; font-size: 15px; color: #333; padding: 24px;">

    <h2 style="color: #E36414;">Nieuwe Scribly aanvraag: {{ $lead->company ?? $lead->name }}</h2>

    <p>Er is een nieuwe aanvraag binnengekomen!</p>

    <h3>Contactgegevens</h3>
    <table>
        <tr><td><strong>Naam</strong></td><td>&nbsp;&nbsp;{{ $lead->name }}</td></tr>
        <tr><td><strong>E-mailadres</strong></td><td>&nbsp;&nbsp;{{ $lead->email }}</td></tr>
        <tr><td><strong>Bedrijf</strong></td><td>&nbsp;&nbsp;{{ $lead->company ?? '(Niet opgegeven)' }}</td></tr>
    </table>

    <h3>Bericht</h3>
    <p>{{ $lead->message ?? '(Geen bericht)' }}</p>

    <h3>Geüploade bestanden</h3>
    <ul>
        <li>Inkoopbestand: <code>{{ basename($lead->inkoopbestand_path) }}</code></li>
        <li>Leveranciersbestand: <code>{{ basename($lead->leverancierbestand_path) }}</code></li>
    </ul>

    <p>Beide bestanden zijn als bijlage meegezonden.</p>

    <hr style="margin-top: 32px;">
    <p style="font-size: 12px; color: #999;">Dit is een geautomatiseerde melding van het Scribly contactformulier.</p>

</body>
</html>
