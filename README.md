# JlasoJsoneditorBundle

Integration json editor in SF2 projects

## Instalation

### Composer

```bash

```

### instantiate Bundle in your kernel init file

```php
// app/AppKernel.php
<?php
    // ...
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Jlaso\Bundle\JlasoJsonEditorBundle\JlasoJsoneditorBundle(),
        );
    }
```

after, run the command

```bash
    php app/console assets:install web/
```

to copy the resources to the projects web directory.

## Others

```

```

## Base configuration

By default, do the following:

Add class "jsoneditor" to textarea field to initialize Htmleditor.

```html
    <textarea class="jsoneditor"></textarea>
```

If you want to use jQuery version of the editor set the following parameters:

```yaml
    jlaso_jsoneditor:
        include_jquery: true
        htmleditor_jquery: true
        ...
```

The option `include_jquery` allow to load external jQuery library from the Google CDN. Set it to `true` if you haven't included jQuery library somewhere yet

If you are using FormBuilder, use an array to add the class, you can also use the `theme` option to change the
used theme to something other than 'simple' (i.e. on of the other defined themes in your config - the example above
defined 'medium').  e.g.:

```php
<?php
    $builder->add('introtext', 'textarea', array(
        'attr' => array(
            'class' => 'jsoneditor',
        )
    ));
```

Add script to your templates/layout at the bottom of your page (for faster page display).

```twig

    {{ jsoneditor_init() }}

```


//app/config/jlaso_jsoneditor.ini


## Localization

You can change language of your tiny_mce by adding language selector into top level of configuration, something like

```yaml
    // app/config/config.yml
    jlaso_jsoneditor:
        include_jquery: true
        jsoneditor_jquery: true
        textarea_class: "jsoneditor"
        language: %locale%
        theme:
            simple:
                mode: "textareas"
                theme: "advanced"
        ...

```

>
