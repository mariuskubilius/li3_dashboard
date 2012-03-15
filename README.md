# Dashboard plugin beginnings for my Lithium framework projects.

## Installation

Checkout the code to your library directory:

    cd libraries
    git clone git@github.com:/mariuskubilius/li3_dashboard.git

Include the library in in your `/app/config/bootstrap/libraries.php`

    Libraries::add('li3_dashboard');

## What's included
currently I have done admin navigation from `/app/config/navigation.js` files


## Roadmap reminder for myself about things which should be done
find better place and name for extension which does the navigation generation
AdminNav seems vague and non descriptive.

test the navigation generation. 
write helper to output it on views. may use principle similar to li3_flash_message.
