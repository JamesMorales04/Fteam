<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Menu
Breadcrumbs::for('menu', function ($trail) {
    $trail->parent('home');
    $trail->push('Menu', route('food.showAll'));
});

// Home > Menu > [Food]
Breadcrumbs::for('food', function ($trail, $food) {
    $trail->parent('menu');
    $trail->push($food->getName(), route('food.show', $food->getId()));
});

// Home > Menu > [ToThreeFood]
Breadcrumbs::for('topthree', function ($trail,) {
    $trail->parent('menu');
    $trail->push('Top Three Food', route('food.topThree'));
});

// Home > Menu > [Reviews]
Breadcrumbs::for('reviews', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push('Reviews', route('reviews.show', $reviews));
});

// Home > Menu > [Create Review]
Breadcrumbs::for('creview', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push('Create Review', route('reviews.create', $reviews));
});

// Home > Menu > [Update Review]
Breadcrumbs::for('ureview', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push('Update Review', route('reviews.update', $reviews));
});

// Home > ShoppingCart
Breadcrumbs::for('shoppingcart', function ($trail) {
    $trail->parent('home');
    $trail->push('Shopping Cart', route('shop.cart'));
});

// Home > ShoppingCart
Breadcrumbs::for('buyshoppingcart', function ($trail) {
    $trail->parent('shoppingcart');
    $trail->push('Buy', route('shop.buy'));
});