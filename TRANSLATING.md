# Translating on ssbpm.info

This page will explain how the translation system works and how you can help translating the website into one of these currently planned languages:

* en - English (Original / Base)

(in some cases English won't have a short code because it's the default)

* de - German
* fr - French
* nl - Dutch
* es - Spanish
* it - Italian
* sv - Swedish
* dk - Danish

## Translation guide lines

##### Common language style  
Write to that the majority of young to middle aged people in your language have no problems understanding.  
You are allowed to use references and jokes but no memes or funny spelling please.
##### Term truthness  
A lot of terms used in softmodding are not to be translated unless you have a more common term for these:  
Softmodding, Homebrew, Hacking, Apps, Controller, Port  
(List may be expanded soon, please apply common sense!)

## Folder structure

Every folder in the root of the project falls into three categories:

* Sub-page folders  
  For instance /wiki/, /about/ and /guides/
* Locale folders  
  Always two letters like /de/, /es/ and /it/ (full list above)
* /lang/ folders  
  Always accompanied by an index.php file (which contains all the information about a page except for the translations) that shares the same parent folder with it.  
  These folders contain the original English version for copying for translation and all the other language files.  
  You should find such a /lang/ folder in every sub-page as well as the root.
* Other folders  
  Not relevant for translating, for instance: /modules/, /quickstart/, /quickstart2/, /git/

For translation, only the sub-page folders and /lang/ folders are relevant.

## JSON format

### Syntax

All language files are JSON files which means they are JavaScript objects and use a certain syntax which goes like this:

```json
{
  "key1": "value1",
  "key2": "value2"
}
```
***(Numeration only for illustrative purposes)***

"Key" being any word (or word combination) for connecting the "value" with something on the web page.  
Don't change the keys unless something about a page structure got changed, but doing it won't break anything except for that translation bit.

Notice that every JSON file starts with an open curly bracket and ends with a closed curly bracket.  
Everything with these curly brackets is called an object and the key-value pairs are properties.  
In the above example these properties are like variables with a name and a string (character sequence) value.  
In an object, every property except for the last one needs to end with a comma as you can see above.  

Properties are often objects itself, starting with a key and then opening a new object. Example:

```json
{
  "key1":  {
    "key2": "value1",
    "key3": "value2",
    "key4": "value3"
  },
  "key5": "value4"
}
```

As you can see objects are no exception for the commas if they have a property following them inside the same shared parent object.  
It's important that values can't be multi-line, so even with a long text you might have to write it out and activate word-wrap in your editor.  
However there are ways to insert line-breaks in the webpage via the translations which we'll go in the [#markdown](#markdown) section.

### Meta-data

In this project every JSON file must start with a structure like this:

```json
{
  "language": "English",
  "lang-code": "en",
  "authors": "waffeln",
  "notes": "",
  ...
```

*(Of course with the respective language, code and authors!)*

If your translation file is not working for some reason, check the meta-data first since "lang-code" is crucial for it to work.  
You can find the language codes at the top of this document.  

When you have translated something, even if it's only one bit,  
you are free to add a comma and your name (real or username) to the end of the "authors" value.

"notes" isn't rendered on the page and is for other translators and developers.  
Feel free to leave any information here you want other people to know when they work with this file,  
including (especially) if something isn't working, fully translated, badly written or worded or whatever.  
Communication is key to successful collaboration, so don't hesitate!  
Remember that values are not allowed to be multi-line so you can't make multiple paragraphs.  
Instead, if you have to you can just add another "note" or "notes" key below it.

### ssbpm.info custom syntax

For the translations for the this project object nesting and grouping is for one of two purposes:

* Structure
* Sub-properties for elements

The first point is easy: instead of having to do this

```json
{
  "heading-title": "value1",
  "heading-subtitle": "value2",
  "article-p1": "value3",
  "article-p2": "value4",
  "article-p3": "value5"
}
```

We can do this

```json
{
  "heading": {
    "title": "value1",
    "subtitle": "value2"
  },
  "article: {
    "p1": "value3",
    "p2": "value4",
    "p3": "value5"
  }
}
```

Looks much nicer, right? Also in supported editors (like Notepad++ or any decent editor)  
you can fold and unfold these objects for a better overview.

The second point is also easy but might be confusing on first sight:  
When the translation system looks for a key which is accociated with a string ("key": "value"),  
it will load that string as the inner content (.innerHTML for anyone who knows JS) of the HTML element.

But if the target key is an object, it will use the properties to *translate* the attributes of the element.  
An element in HTML can have very many attributes, such as a title which is the text you see, when you hover over it with a mouse,  
or custom attributes for popovers which are small windows that appear on top or next to an element which explain something.  
They aren't inside the element in the source code so we need to use this in order to make them translatable.

A simple example of how to add a translation for a title (normaly you don't have to make this change, it's already done in the English version):

```json
{
  "key": "This is the translated content."
}
```

into

```json
{
  "key": {
    "title": "Oh look this appears when you hover on this element.",
    "html": "This is the translated content."
  }
}
```

So when we use an object to describe more than just the content of the element,  
we use the sub-property (key) "html" to tell the translation system that that's what we want to see as the content.

## Markdown

#### [Full showdown.js documentation](https://github.com/showdownjs/showdown/wiki)
#### [Live showdown.js editor for testing](https://demo.showdownjs.com/)

All translations are run through a markdown to HTML compiler called Showdown.js.  
It allows us to use both simple and advanced styling without needing to write actual HTML.  
For instance, almost the entire Discord and GitHub markdown syntax is available through Showdown.js.

That means you can write this in the translations:
```json
"key": "**Hey,** look at this __underlined__ word! And this is *italics*!
**Bold** is done like this**. And links are done like [this](http://example.com).
```
More examples and explanations coming soon, but you get the idea.  
Also basically all English translation files are also already styled, so you just need to move around the styling for your language phrasing.

This is the biggest advantage of having markdown support:  
Translators don't have to adhere to the styling syntax (and therefore order) of how the original version looked like.  
It gives you full power over how your translation looks and you should utilize it!

## Espacing

Sometimes you need to write a character that is a part of the JSON syntax, most often (always?) the double quote character `"`.  
When you want to type out this character, you *escape* it with a backslash `\`.

Example:
```json
"key": "Fskin always says \"Ike is so broken.\" and it annoys me."
```
The backslash is the general escape character in JSON for writing out a character that would usually be interpreted for something like an ending string or other stuff.  
In order to write a backslash, you just put another backslash in front of it like this `\\`.

These will show up as one backslash each:
```json
"key": "Put the file in C:\\Program Files\\"
```
As of right now the only characters you need to escape if you want them to appear are double quotes, backslashes, and everything else you don't want interpreted by Showdown.js.