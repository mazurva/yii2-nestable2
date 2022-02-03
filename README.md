yii2-nestable2
=============

Yii 2.0 implementation of nested set behavior using jquery.nestable2 plugin.
- jquery.nestable plugin: https://ramonsmit.github.io/Nestable2/
- Nested Sets Behavior for Yii 2: https://github.com/creocoder/yii2-nested-sets

![tree](https://user-images.githubusercontent.com/1152567/152440593-2d69b582-264d-4e90-97e7-a642fff01b3b.jpg)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require mazurva/yii2-nestable2 "dev-master"
```

or add

```
"mazurva/yii2-nestable2": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

Make sure you've attached the NestedSetsBehavior (creocoder/yii2-nested-sets) correctly to your model.
Then add the node move handler to you controller by attaching the supplied action;

```
use mazurva\nestable2\widgets\Nestable;

class yourClass extends Controller
{
    public function actions() {
        return [
            'nodeMove' => [
                'class' => 'mazurva\nestable2\actions\NodeMoveAction',
                'modelName' => TreeModel::className(),
            ],
        ];
    }

```

And then render the widget in your view;

```
echo Nestable::widget([
    'type' => Nestable::TYPE_WITH_HANDLE,
    'query' => TreeModel::find()->where([ top of tree ]),
    'modelOptions' => [
        'name' => 'name'
    ],
    'pluginEvents' => [
        'change' => 'function(e) {}',
    ],
    'pluginOptions' => [
        'maxDepth' => 7,
    ],
]);

```

You can either supply an ActiveQuery object in `query` from which a tree will be built.
You can also supply an item list;
```
    ...
    'items' => [
        ['content' => 'Item # 1', 'id' => 1],
        ['content' => 'Item # 2', 'id' => 2],
        ['content' => 'Item # 3', 'id' => 3],
        ['content' => 'Item # 4 with children', 'id' => 4, 'children' => [
            ['content' => 'Item # 4.1', 'id' => 5],
            ['content' => 'Item # 4.2', 'id' => 6],
            ['content' => 'Item # 4.3', 'id' => 7],
        ]],
    ],
```

The `modelOptions['name']` should hold an attribute name that will be used to name on the items in the list.
You can alternatively supply an unnamed `function($model)` to build your own content string.

Supply a `pluginEvents['change']` with some JavaScript code to catch the change event fired by jquery.nestable plugin.
The `pluginOptions` accepts all the options for the original jquery.nestable plugin.
