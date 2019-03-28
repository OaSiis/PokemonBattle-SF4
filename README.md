# Pokemon Battle

## PHP

### Les Variables

Une variable, c'est une petite information stockée en mémoire temporairement. Elle n'a pas une grande durée de vie. En PHP, la variable (l'information) existe tant que la page est en cours de génération. Dès que la page PHP est générée, toutes les variables sont supprimées de la mémoire car elles ne servent plus à rien. Ce n'est donc pas un fichier qui reste stocké sur le disque dur mais une petite information temporaire présente en mémoire vive.

``` php
$pokemonName = "Salamèche";
$pokemon_name = "Salamèche";
```
1. On signale PHP que **ON UTILISE UNE VARIABLE** par le préfix : **$** 
2. Le nom de la variable **camelCase** ou **snake_case**.
3. Il y a le signe ( **=** ) pour attribuer à la variable une valeur.
4. La valeur, ici *"Salamèche"*
5. L'incontournable ( **;** ) qui permet de terminer l'instruction.

#### Type de variables

* **String** : Les chaînes de caractères 
``` php
$string = "Je suis un texte";
```

* **Integer** : Nombres entiers 
``` php
$integer = 42;
```

* **Booléens** 
``` php
$bool = TRUE;
$bool = FALSE;
```

* **Rien** : Absence de type
``` php
$nothing = NULL;
```

#### Constantes

Les constants sont toujours en **ALL_CAPS**
``` php
const TYPE_FIRE = "fire";
```


### Les Conditions

``` php
// Si ... Sinon ...
if ($note < 10) {
    echo "Tu es mauvais";
} else {
    echo "Tu es assez bon";
}

// Ternaires (conditions condensées)
echo ($note < 10) ? "Tu es mauvais" : "Tu es assez bon";

// Si ... Sinon si ... Sinon ...
if ($note == 0) {
    echo "Tu es vraiment un gros nul !!!";
} elseif ($note == 5) {
    echo "Tu es très mauvais";
} elseif ($note == 7) {
    echo "Tu es mauvais";
} elseif ($note == 10) {
    echo "Tu as pile poil la moyenne, c'est un peu juste…";
} elseif ($note == 12) {
    echo "Tu es assez bon";
} elseif ($note == 16) {
    echo "Tu te débrouilles très bien !";
} elseif ($note == 20) {
    echo "Excellent travail, c'est parfait !";
} else {
    echo "Je n'ai pas de message à afficher pour cette note";
}

switch ($note) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $note vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    case 5: // dans le cas où $note vaut 5
        echo "Tu es très mauvais";
    break;
    case 7: // dans le cas où $note vaut 7
        echo "Tu es mauvais";
    break;
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    case 12:
        echo "Tu es assez bon";
    break;
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    default:
        echo "Je n'ai pas de message à afficher pour cette note";
}
```

#### Symbole 

```
Symbole  Signification

  ==     Est égal à

  ===    Est égal à (valeur + type)

  >      Est supérieur à

  <      Est inférieur à

  >=     Est supérieur ou égal à

  <=     Est inférieur ou égal à

  !=     Est différent de
```

#### Conditions multiples
```
Symbole  Mot-clé  Signification

  &&       AND         Et

  ||       OR          Ou

```

### Tableau
```php
$array = ['Salamèche', 40, 'Flammèche', true];

echo $array[0]; // "Salamèche"
echo $array[1]; // 40
echo $array[2]; // "Flammèche"
echo $array[3]; // true
```

```php
// Tableau associatif
$array = [
    'name' => 'Salamèche', 
    'health' => 40, 
    'attaque' => 'Flammèche', 
    'enabled' => true
];

echo $array['name']; // Salamèche
echo $array['health']; // 40
echo $array['attaque']; // Flammèche
echo $array['enabled']; // true
```

Pour parcourir un tableau, on utilise la boucle **foreach**
```php
$pokemons = ['Salamèche', 'Carapuce', 'Pikachu', 'Magicarpe'];
foreach($pokemons as $pokemon) {
    echo $pokemon . '<br />';
}

// Affichera : 
// Salamèche
// Carapuce
// Pikachu
// Magicarpe


//Si on a besoin de destructurer le tableau
$pokemon = ['Salamèche', 40, 'Flammèche', true];
foreach($pokemons as [$name, $heath, $attaque, $enabled]) {
    echo $name; // Salamèche
    echo $heath; // 40
    echo $attaque; // Flammèche
    echo $enabled; // true
}


// Tableau associatif
$pokemon = [
    'name' => 'Salamèche', 
    'health' => 40, 
    'attaque' => 'Flammèche', 
    'enabled' => true
];

foreach($pokemon as $key => $item) {
    echo $key . 'vaut' . $item . '<br />';
}

// Affichera : 
// name vaut Salamèche
// health vaut 40
// attaque vaut Flammèche
// enabled vaut true
```

### Fonction

WIP

## Programation orienté objet (POO)

## Héritage

En PHP, on utlise **extends** pour ajouter à l'objet un *parent*

``` php
class Pokemon extends Base
```

Dans l'exemple, l'objet **Pokemon** utilisera toutes les fonctions de l'objet **Base**

## Fonction 

* **Private** : Visible par la classe uniquement
* **Protected** : Visible par la classe et les sous-classes (héritage)
* **Public** : Visible par tout le monde

```php
<?php 

class MyClass
{
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';
}

$obj = new MyClass();
echo $obj->public; // Work
echo $obj->protected; // Fatal Error
echo $obj->private; // Fatal Error
```
## Entity : Model

### Créer une entité

Pour notre application, il faudra créer un objet/model **Pokemon**.
Nous utilisons la commande **make:entity** pour créer la **classe** et les **champs** que nous avons besoins.

* Nom de la classe
* Nom des champs
* Type de champ (string, interger, relation)
* Nullable (null)

```
php bin/console make:entity

Class name of the entity to create or update:

> Pokemon

New property name (press <return> to stop adding fields):

> name

Field type (enter ? to see all types) [string]:
> string

Field length [255]:
> 255

Can this field be null in the database (nullable) (yes/no) [no]:
> no
```

### Attributs par défaut
Nous avons aussi parfois besoin de définir une certaine valeur à nos entités lors de leur création. Or nos entités sont de simples objets PHP, et la création d'un objet PHP fait appel… au constructeur. 


```php
public function __construct()
{
    // Par défaut, la date de création est la date d'aujourd'hui
    $this->createdAt = new \Datetime();
}
```

### Setters & Getters

```php
public function setName(string $name): self
{
    $this->name = $name;

    return $this;
}
```
La méthode **set** est appelée lorsque l'on essaye d'assigner une valeur à un attribut auquel on n'a pas accès ou qui n'existe pas. Après le mot **set** on ajoute le nom de l'attribut : **setName**. Cette méthode prend 1 paramètre : la valeur que l'on a tenté d'assigner à l'attribut.

```php
public function getName(): ?string
{
    return $this->name;
}
```
La méthode **get** est appelée lorsque l'on essaye d'accéder à un attribut qui n'existe pas ou auquel on n'a pas accès. Après le mot **get** on ajouter le nom de l'attribut qu'on essaye d'accéder : **getName**

## Doctrine (ORM)

ORM (pour Object-Relation Mapper, soit en français « lien objet-relation »): définit des correspondances entre les schémas de la base de données et les classes de notre application. 

Pour faire la correspondance, nous devons utiliser des commentaires !
``` php
/**
 * @ORM\Column(type="string", length=255, nullable=true, unique=true)
 */
private $exemple
```
 Ce type de commentaires se nomme **Annotation**. L'exemple ci-dessus permet d'ajouter une nouvelle **Column** dans notre table de type *string*, qui peut être *NULL* et qui est définit comme *unique* . Le nom du champ dans la table prendra la valeur *exemple*

### Relation
 faut utiliser des commentaires !
``` php
/**
 * @ORM\Column(type="string", length=255)
 */
private $name
```
 Ce type de commentaires se nomme **Annotation**. L'exemple ci-dessus permet d'ajouter une nouvelle **Column** dans notre table de type *string*. Le nom du champ dans la table prendra la valeur **name**

### Relation

* OneToOne (1 .. 1)
* OneToMany (1 .. n)
* ManyToOne (n .. 1)
* ManyToMany (n .. n)

## Fixtures
