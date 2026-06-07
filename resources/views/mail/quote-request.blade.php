<h1>Nieuwe aanvraag via de Tago website</h1>

<dl>
    <dt>Naam</dt>
    <dd>{{ $submission['name'] }}</dd>

    <dt>E-mail</dt>
    <dd>{{ $submission['email'] }}</dd>

    <dt>Telefoon</dt>
    <dd>{{ $submission['phone'] ?? 'Niet ingevuld' }}</dd>

    <dt>Type tafel</dt>
    <dd>{{ $submission['table_type'] }}</dd>

    <dt>Afmetingen</dt>
    <dd>{{ $submission['dimensions'] ?? 'Niet ingevuld' }}</dd>

    <dt>Stijl</dt>
    <dd>{{ $submission['style'] ?? 'Niet ingevuld' }}</dd>

    <dt>Houtkleur</dt>
    <dd>{{ $submission['wood_color'] ?? 'Niet ingevuld' }}</dd>

    <dt>Bericht</dt>
    <dd>{{ $submission['message'] }}</dd>
</dl>
