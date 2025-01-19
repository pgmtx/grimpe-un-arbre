# Grimpe un arbre

> Site web proposant de grimper des arbres

## Configuration

Il faut ajouter le fichier `php/config.php`, structuré de cette façon :

```php
<?php
return array(
  'host' => 'nom_de_domaine_ou_localhost',
  'dbname' => 'grimpe_un_arbre', // ou nom_utilisateur
  'username' => 'nom_utilisateur',
  'password' => 'mot_de_passe',
);
?>
```

Le script [creer_config.sh](./creer_config.sh) permet de le générer facilement.

