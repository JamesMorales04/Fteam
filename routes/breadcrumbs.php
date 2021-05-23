<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('general.home'), route('home'));
});

// Menu
// Home > Menu
Breadcrumbs::for('login', function ($trail) {
    $trail->parent('home');
    $trail->push(__('general.login'), route('login'));
});

// Login
// Home > Login
Breadcrumbs::for('register', function ($trail) {
    $trail->parent('home');
    $trail->push(__('general.register'), route('register'));
});

// Register
// Home > Register
Breadcrumbs::for('menu', function ($trail) {
    $trail->parent('home');
    $trail->push(__('food.menu'), route('food.showAll'));
});

// Home > Menu > [Food] > [EditFood]
Breadcrumbs::for('updatefood', function ($trail, $food) {
    $trail->parent('food', $food);
    $trail->push(__('general.update').' '.$food->getName(), route('food.update', $food->getId()));
});

// Home > Menu > [ToThreeFood]
Breadcrumbs::for('topthree', function ($trail) {
    $trail->parent('menu');
    $trail->push(__('food.topThree'), route('food.topThree'));
});

// Home > Menu > Only Ingredients
Breadcrumbs::for('onlyIngredients', function ($trail) {
    $trail->parent('menu');
    $trail->push(__('food.askForIngredients'), route('shop.addAsIngresients'));
});

// Home > Menu > [Reviews]
Breadcrumbs::for('reviews', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push(__('reviews.review'), route('reviews.show', $reviews));
});

// Home > Menu > [Create Review]
Breadcrumbs::for('creview', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push(__('reviews.createReviews'), route('reviews.create', $reviews));
});

// Home > Menu > [Update Review]
Breadcrumbs::for('ureview', function ($trail, $reviews) {
    $trail->parent('menu');
    $trail->push(__('reviews.updateReviews'), route('reviews.update', $reviews));
});

// ShoppingCart
// Home > ShoppingCart
Breadcrumbs::for('shoppingcart', function ($trail) {
    $trail->parent('home');
    $trail->push(__('shoppingCart.shoppingCart'), route('shop.cart'));
});

// Home > ShoppingCart
Breadcrumbs::for('buyshoppingcart', function ($trail) {
    $trail->parent('shoppingcart');
    $trail->push(__('shoppingCart.buy'), route('shop.buy'));
});

// AdminPanel
// Home > AdminPanel
Breadcrumbs::for('adminpanel', function ($trail) {
    $trail->parent('home');
    $trail->push(__('admin.adminPanel'), route('admin.panel'));
});

// Home > AdminPanel > showAllFood
Breadcrumbs::for('showallfood', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('food.foods'), route('admin.showAllFood'));
});

// Home > AdminPanel > showallfood > [Food] 
Breadcrumbs::for('food', function ($trail, $food) {
    $trail->parent('showallfood');
    $trail->push($food->getName(), route('food.show', $food->getId()));
});

// Home > AdminPanel > ShowUsers
Breadcrumbs::for('showusers', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('user.showAllUsers'), route('admin.showAllUsers'));
});

// Home > AdminPanel > ShowAllOrders
Breadcrumbs::for('showorders', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('order.showAllOrders'), route('admin.showAllOrders'));
});

// Home > AdminPanel > ShowAllIngredients
Breadcrumbs::for('showingredients', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('ingredients.showIngredients'), route('ingredients.show'));
});

// Home > AdminPanel > ShowAllIngredients > [Ingredient]
Breadcrumbs::for('ingredient', function ($trail, $ingredient) {
    $trail->parent('showingredients');
    $trail->push($ingredient->getName(), route('ingredients.showI', $ingredient->getId()));
});

// Home > AdminPanel > ShowAllIngredients > [Ingredient] > [UpdateIngredient]
Breadcrumbs::for('uingredient', function ($trail, $ingredient) {
    $trail->parent('ingredient', $ingredient);
    $trail->push(__('general.update').' '.$ingredient->getName(), route('ingredients.showI', $ingredient->getId()));
});

// Home > AdminPanel > CreateIngredient
Breadcrumbs::for('createingredient', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('ingredients.createIngredient'), route('ingredients.create'));
});

// Home > AdminPanel > CreateFood
Breadcrumbs::for('createfood', function ($trail) {
    $trail->parent('adminpanel');
    $trail->push(__('food.createFood'), route('food.create'));
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
    $trail->push(__('general.update').' '.$user->getName(), route('user.update', $user->getId()));
});

// Home > [UserProfile] > AddCreditCard
Breadcrumbs::for('addcreditcard', function ($trail, $user) {
    $trail->parent('userprofile', $user);
    $trail->push(__('creditCard.addCreditCard') , route('creditCard.create'));
});

// Home > [UserProfile] > ShowCreditCard
Breadcrumbs::for('showcreditcard', function ($trail, $user) {
    $trail->parent('userprofile', $user);
    $trail->push(__('creditCard.seeCreditCard') , route('creditCard.show', $user->getId()));
});

// Home > [UserProfile] > ShowCreditCard
Breadcrumbs::for('updatecreditcard', function ($trail, $user) {
    $trail->parent('showcreditcard', $user);
    $trail->push(__('creditCard.updateCreditCard') , route('creditCard.update', Auth::id()));
});
