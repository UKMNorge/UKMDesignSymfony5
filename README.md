# UKMDesignSymfony5
UKMDesign for Symfony5-applikasjoner

For å installere
`composer require ukmnorge/designsymfony5`

DesignBundle'n krever at du definerer følgende fil i prosjekt-mappa:

```yaml
#config/packages/ukm_design.yaml

ukm_design:
  hostname: ukm.dev
  section_id: tv
  section_name: UKM-TV
  section_url: 'https://tv.ukm.dev'
```

I tillegg må du legge til følgende linje i `config/bundles.php`
```php
return [
    [...]
    UKMNorge\DesignBundle\DesignBundle::class => ['all'=>true]
];
```

**OBS:**
For øyeblikket laster bundle'n ikke inn parameters, som vil gi feil section ID, Name og Url. Det jobbes med å fikse dette, men foreløpig står det på [todo](https://github.com/UKMNorge/UKMDesignSymfony5/issues/1)'n.