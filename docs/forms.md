# Asynchronous Form-Validation

Requires [async-form.js](../resources/js/async-form.js) and [forms.css](../resources/css/forms.css).

To use asynchronous form-validation ("Ajax-Form"), you need to add the `AsyncFormRedirectMiddleware` to
the `App/Http/Kernel.php`-file:

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Mintellity\BladeComponents\Http\Middleware\AsyncFormRedirectMiddleware::class
    ],
];
```

Then you can use the form component to asynchronously validate the form and display the errors:

```bladehtml

<x-mint::form action="/" method="post">
    <x-mint::form.input name="name" label="Name"/>
    ...
</x-mint::form>
```

Forms maybe submitted by a remote buttin (outside the form) by adding the class `ajax-button` and the data attribute `form`to a button:
```bladehtml
<button class="ajax-button" data-form="form-id">Submit</button>

<x-mint::form id="form-id" action="/" method="post">
    <x-mint::form.input name="name" label="Name"/>
    ...
</x-mint::form>
```

The form component includes the CSRF-Token out of the box. Furthermore, it supports the methods
like `GET`, `POST`, `PUT`, `PATCH` and `DELETE` and adds the required hidden input field for the method.

## Inline labels

To use inline labels, change the config value `form.inline-labels` to `true`. You can also change the width of the
labels:

```php
// config/blade-components.php

return [
    'form' => [
        'inline-labels' => true,
        'inline-label-width' => '2' // col-md-2
    ]
];
```

```bladehtml
<x-mint::form.input
    name="name"
    label="Name"
    value="Vorname"
    :inline-labels="true"/>
```

# Form-Inputs

[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/overview/)

```bladehtml

<x-mint::form.input
    name="name"
    label="Name"
    value="Vorname"/>

<x-mint::form.input name="name" label="Betrag" value="100">
    <x-mint::form.input.prepend>Ab</x-mint::form.input.prepend>
    <x-mint::form.input.append>€</x-mint::form.input.append>
</x-mint::form.input>
```

## Attributes

| Attribute | Description                                                           |
|-----------|-----------------------------------------------------------------------|
| name      | "name"-attribute of the input element, also used for the id attribute |

You can add other attributes to the input element, the label or the group. Just prefix them with `group:` or `label:`:

```bladehtml

<x-mint::form.input
    name="amount"
    group:class="bg-green"
    group:style="background-color: green"
    label:class="font-bold"
    label="Betrag"
    value="100"
    min="10"
    max="200"/>
```

## Other Input types

### Checkbox

[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#defaultCheck1)

```bladehtml

<x-mint::form.checkbox
    name="checkbox"
    :items="['value1' => 'Name 1', 'value2' => 'Name 2', 'value3' => 'Name 3']"
    :value="['value1', 'value3']"
    :disabled="['value2']"
    label:class="..."
    item:class="..."
    item-group:class="..."
    item-label:class="..."/>
```

### Toggle

[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#switches)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#flexSwitchCheckDefault)

```bladehtml

<x-mint::form.toggle
    name="name"
    label:class="..."
    group:class="..."/>
```

### Select

[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/select/)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#exampleFormControlSelect1)

```bladehtml

<x-mint::form.select
    name="name"
    selected="value"
    :options="['value' => 'Name', 'value2' => 'Name2']"
    :disabled="['value2']"
    :placeholder="'Auswählen'"
    label:class="..."
    group:class="..."/>
```

### Radio

[Bootstrap-Components](https://getbootstrap.com/docs/5.3/forms/checks-radios/#radios)
[Frest-Theme](https://demos.pixinvent.com/frest-html-admin-template/html/vertical-menu-template-bordered/forms-basic-inputs.html#defaultRadio1)

```bladehtml

<x-mint::form.radio
    name="name"
    value="value1"
    :items="['value1' => 'Option 1', 'value2' => 'Option 2']"
    :disabled="['value2']"
    label:class="..."
    item:class="..."
    item-group:class="..."
    item-label:class="..."/>
```

### Textarea

Automatic height resizing depending on content.
Requires [textarea.js](../resources/js/textarea.js) and [textarea.css](../resources/css/textarea.css).

```bladehtml

<x-mint::form.textarea
    name="name"
    label:class="..."
    group:class="..."/>
```

### Date

Using [Pikaday](https://github.com/Pikaday/Pikaday).
Requires [datepicker.js](../resources/js/datepicker.js) and [datepicker.css](../resources/css/datepicker.css).

```bladehtml

<x-mint::form.date
    name="name"/>
```

## Card-Radio

```bladehtml

<div class="row g-3">
    <div class="col-sm-6 col-md-4">
        <x-mint::form.card-radio
            name="icon"
            value="icon-1"
            :checked="true">
            Mein Icon
        </x-mint::form.card-radio>
    </div>
</div>
```
