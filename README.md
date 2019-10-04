# Welcome to the Card family!
<img width="50" src="https://github.com/techdivision/card-documentation-assets/raw/master/assets/Logo.png" alt="" />

Available Card Packages  
[Card - the basics](https://github.com/techdivision/card)  
[Card decks - aggregate cards beautifully](https://github.com/techdivision/card-decks)      
[Card shuffle - deck filtering](https://github.com/techdivision/card-shuffle)      
[Bootstrap 4 styling for cards](https://github.com/techdivision/card-bootstrap4)        
[Materialize styling for cards](https://github.com/techdivision/card-materialize)  

# TechDivision.Card.Shuffle - Mix up your decks!
> Use this package if you
> - want cards, decks and filtering 
> - know how to apply css classes and styling on your own  

Shuffle enables dynamic filtering of your card decks.  
With the powerful [sitegeist/taxonomy](https://github.com/sitegeist/Sitegeist.Taxonomy) package you can add tags to your cards.  
Some minimal styling is added, so that you can use it out of the box.  
![Filtering](https://github.com/techdivision/card-documentation-assets/raw/master/assets/card-shuffle/shuffle.gif)


## For editors
This package brings only some tiny options that enable filtering  
![Filtering](https://github.com/techdivision/card-documentation-assets/raw/master/assets/card-shuffle/enableFiltering.png)

In order to add new tags, you first have to [create new vocabularies and taxonomies](https://github.com/sitegeist/Sitegeist.Taxonomy)  
![Create new tags](https://github.com/techdivision/card-documentation-assets/raw/master/assets/card-shuffle/taxonomy.gif)

Add tag to your card  
![Add new tags](https://github.com/techdivision/card-documentation-assets/raw/master/assets/card-shuffle/addTaxonomies.gif)  

## For Developers

### Installation

TechDivision.Card.Shuffle is available via packagist. Add `"techdivision/card-shuffle" : "~1.0"` to the require section of the composer.json
or run `composer require techdivision/card-shuffle`.  
**This package also installs [TechDivision.Card](https://github.com/techdivision/card), [TechDivision.Card.Decks](https://github.com/techdivision/card-decks) and [Sitegeist.Taxonomy](https://github.com/sitegeist/Sitegeist.Taxonomy).**

### Configuration
TechDivision.Card.Shuffle runs out of the box.  
In order to remove the default stylesheet, please do the following:  

```
prototype(Neos.Neos:Page) {
    head.stylesheets.shuffle >
}

```

Now you can add your own styles.

### Contribution
We will be happy to receive pull requests - dont hesitate!
