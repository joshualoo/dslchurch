/**
 * This is an example module for learning how to create a module file
 * This file is not meant to be imported into your project
 * This file is split into sections where each section should technically be its own file. However, for the sake of conveniance, we are showing all the examples in one file but pretend like they are multiple files.
 */


// Create a function you can import
// 
// Usage:
// 
// import {justMe} from './modules/example-module'
// 
// justMe();
export function justMe() {
	console.log('')
}


// =============================================================



// You can create multiple exported functions
// 
// Usage:
// 
// import {oneFunc, twoFunc} from './modules/example-module'
// 
// oneFunc();
// twoFunc();

export function oneFunc() {
	console.log('Function One');
}

export function twoFunc() {
	console.log('Function Two');
}


// =============================================================



// You can have multiple functions but only include the ones you need in your main script
// 
// Usage:
// 
// import {justMe} from './modules/example-module'
// 
// justMe(); // writes "just me";
// notMe(); // error: undefined is not a function

export function justMe() {
	console.log('just me');
}

export function notMe() {
	console.log('you should not see this message');
}


// =============================================================



// You can create multiple exported functions and include them ALL
// You just have to give them a name to be referenced as (in this example 'mod')
// 
// Usage:
// 
// import * as mod from './modules/example-module'
// 
// mod.oneFunc();
// mod.twoFunc();
// mod.threeFunc();

export function oneFunc() {
	console.log('Function One');
}

export function twoFunc() {
	console.log('Function Two');
}

export function threeFunc() {
	console.log('Function Three');
}


