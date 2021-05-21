<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Menu
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

// Home > Menu > [Food] > [EditFood]
Breadcrumbs::for('updatefood', function ($trail, $food) {
    $trail->parent('food', $food);
    $trail->push('Edit '.$food->getName(), route('food.update', $food->getId()));
});

// Home > Menu > [ToThreeFood]
Breadcrumbs::for('topthree', function ($trail) {
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

// ShoppingCart
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

// AdminPanel
// Home > AdminPanel
Breadcrumbs::for('adminpanel', function ($trail) {
    $trail->parent('home');
    $trail->push('Admin Panel', route('admin.panel'));
});

// Home > AdminPanel > ShowUsers
Breadcrumbs::for('showusers', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push('Show Users', route('user.showAll'));
});

// Home > AdminPanel > ShowAllOrders
Breadcrumbs::for('showorders', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push('Show Orders', route('order.showAll'));
});

// Home > AdminPanel > ShowAllIngredients
Breadcrumbs::for('showingredients', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push('Show Ingredients', route('ingredients.show'));
});

// Home > AdminPanel > ShowAllIngredients > [Ingredient]
Breadcrumbs::for('ingredient', function ($trail, $ingredient) {
    $trail->parent('showingredients');
    // $trail->push('Show Ingredients', route('ingredients.show'));
    $trail->push($ingredient->getName(), route('ingredients.showI', $ingredient->getId()));
});

// Home > AdminPanel > ShowAllIngredients > [Ingredient] > [UpdateIngredient]
Breadcrumbs::for('uingredient', function ($trail, $ingredient) {
    $trail->parent('ingredient', $ingredient);
    $trail->push('Update '.$ingredient->getName(), route('ingredients.showI', $ingredient->getId()));
});

// Home > AdminPanel > CreateIngredient
Breadcrumbs::for('createingredient', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push('Create Ingredient', route('ingredients.create'));
});

// Home > AdminPanel > CreateFood
Breadcrumbs::for('createfood', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push('Create Food', route('food.create'));
});

// UserProfile
// Home > [UserProfile]
Breadcrumbs::for('userprofile', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->getName(), route('user.show', $user->getId()));
});

// Home > [UserProfile] > [Edit]
Breadcrumbs::for('edituser', function ($trail, $user) {
    $trail->parent('userprofile', $user);
    $trail->push('Update '.$user->getName(), route('user.update', $user->getId()));
});

// Home > [UserProfile] > AddCreditCard
Breadcrumbs::for('addcreditcard', function ($trail, $user) {
    $trail->parent('userprofile', $user);
    $trail->push('Add Credit Card', route('creditCard.create'));
});

// Home > [UserProfile] > ShowCreditCard
Breadcrumbs::for('showcreditcard', function ($trail, $user) {
    $trail->parent('userprofile', $user);
    $trail->push('See Credit Card', route('creditCard.show', $user->getId()));
});

// Home > [UserProfile] > ShowCreditCard
Breadcrumbs::for('updatecreditcard', function ($trail, $user) {
    $trail->parent('showcreditcard', $user);
    $trail->push('Update Credit Card', route('creditCard.update', Auth::id()));
});
