<x-mail::message>
# Nieuwe Lead: {{ $lead->company ?? $lead->name }}

Er is een nieuwe aanvraag binnengekomen!

**Contactgegevens:**
- **Naam:** {{ $lead->name }}
- **E-mailadres:** {{ $lead->email }}
- **Bedrijf:** {{ $lead->company ?? '(Niet opgegeven)' }}

**Bericht:**
{{ $lead->message ?? '(Geen bericht)' }}

**Geüploade bestanden:**
- Inkoopbestand: `{{ basename($lead->inkoopbestand_path) }}`
- Leveranciersbestand: `{{ basename($lead->leverancierbestand_path) }}`

Beide bestanden zijn als bijlage meegezonden.

---

*Dit is een geautomatiseerde melding van het Scribly contactformulier.*
</x-mail::message>
