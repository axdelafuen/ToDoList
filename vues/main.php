 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil | ToDo List</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
    <link rel="icon" type="image/x-icon" href="ressources/images/favicon.png" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>

<div class="todo-header">
    <div>
        <h1 class="title">
            <span class="material-symbols-outlined">format_list_bulleted</span>ToDo List
        </h1>
        <span>Logged as : <u><?= $email?></u></span>
    </div>
    <form method="post">
        <input class="disconnect-button" type="submit" value="Se déconnecter">
        <input type="hidden" name="action" value="déconnexion">
    </form>
</div>

<div class="todo-container">
    <div class="todo">
        <div class="todo-sidebar">
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
            <span>Content</span>
            <span>Content</span>
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
            <span>Content a a a aa a a a  a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a</span>
        </div>
        <div class="todo-content">
            <h2>Content Title</h2>
            <p> 
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id leo tincidunt, eleifend quam id, interdum diam. Suspendisse in metus vitae libero ornare convallis. In sit amet diam eu diam semper sollicitudin. Ut placerat a neque hendrerit rhoncus. Ut nec malesuada libero. Etiam vel ultricies justo, quis posuere neque. Cras imperdiet nisi est, quis efficitur purus ullamcorper id. Duis sollicitudin luctus dictum. Sed ac laoreet nulla. Morbi nec luctus sem. Integer ipsum quam, tincidunt quis ligula vitae, accumsan accumsan ipsum. Praesent non felis a leo dignissim placerat id id nibh. Phasellus mollis pellentesque quam eu tristique. In fermentum consectetur sem, nec posuere ante. Proin efficitur fermentum ultricies. Sed ullamcorper nibh erat, ac efficitur ex vulputate quis.

Cras non convallis risus, vitae porta mi. Suspendisse pharetra dignissim turpis quis aliquam. In mi erat, consequat ut sagittis eget, tincidunt quis nulla. Nam nec est eu turpis suscipit egestas. Mauris non semper purus. In sed est ullamcorper, laoreet nisi in, consectetur dolor. Praesent luctus id nibh quis dignissim. Nulla consectetur nisl nunc, tempus dictum augue imperdiet ut. Phasellus ligula erat, faucibus eu luctus sit amet, scelerisque sed arcu. Donec ante felis, eleifend ac neque eget, eleifend bibendum velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas tincidunt, urna nec rutrum aliquam, arcu nisl scelerisque lacus, sit amet vestibulum neque massa ac elit. Cras vitae luctus purus, quis mollis ex. Nulla metus nisl, bibendum ac lacus ac, dapibus blandit mauris. Etiam in tempus risus.

Maecenas eleifend, lectus in cursus vehicula, mi nunc laoreet arcu, in congue sapien arcu in neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean justo enim, gravida sed sapien at, pharetra aliquam erat. Praesent id pulvinar orci. Quisque dictum et nulla non aliquet. Mauris aliquam massa sit amet nibh volutpat volutpat. Maecenas vitae tincidunt ligula. Aliquam ut pellentesque metus, et posuere urna. Vestibulum imperdiet sagittis neque a dignissim. Suspendisse vel ipsum sapien. In bibendum justo sed tortor venenatis, et hendrerit urna egestas.

Integer a ipsum egestas, rutrum ligula in, hendrerit erat. Nullam volutpat nibh ut augue bibendum tempus. Proin urna leo, aliquet gravida tempor ac, porta vitae erat. Aliquam ex risus, rhoncus vulputate dolor ut, aliquam feugiat nunc. Sed eu fringilla sapien, in tempor turpis. Morbi aliquet felis ut ligula dignissim tristique. Ut ut neque eu turpis mollis ullamcorper maximus vel urna.

Pellentesque vel malesuada arcu. Phasellus convallis urna a risus aliquam rutrum. In nulla ante, pulvinar at cursus ut, dictum et metus. Duis a nisl sed purus imperdiet aliquet id a nulla. Duis sit amet arcu sed sem hendrerit sodales. Integer interdum vehicula felis in pharetra. Cras id pretium nisl, ut convallis dolor. Pellentesque tristique massa elit, sit amet consectetur justo dignissim vel. Nunc vitae est eu nisi imperdiet posuere id at ipsum. Donec nec orci dictum, vehicula turpis sed, elementum leo. Donec pellentesque tortor at justo tempor sollicitudin. Mauris sit amet felis at mi luctus venenatis sit amet quis lacus. Maecenas scelerisque tellus nec lectus elementum dapibus.  

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id leo tincidunt, eleifend quam id, interdum diam. Suspendisse in metus vitae libero ornare convallis. In sit amet diam eu diam semper sollicitudin. Ut placerat a neque hendrerit rhoncus. Ut nec malesuada libero. Etiam vel ultricies justo, quis posuere neque. Cras imperdiet nisi est, quis efficitur purus ullamcorper id. Duis sollicitudin luctus dictum. Sed ac laoreet nulla. Morbi nec luctus sem. Integer ipsum quam, tincidunt quis ligula vitae, accumsan accumsan ipsum. Praesent non felis a leo dignissim placerat id id nibh. Phasellus mollis pellentesque quam eu tristique. In fermentum consectetur sem, nec posuere ante. Proin efficitur fermentum ultricies. Sed ullamcorper nibh erat, ac efficitur ex vulputate quis.

Cras non convallis risus, vitae porta mi. Suspendisse pharetra dignissim turpis quis aliquam. In mi erat, consequat ut sagittis eget, tincidunt quis nulla. Nam nec est eu turpis suscipit egestas. Mauris non semper purus. In sed est ullamcorper, laoreet nisi in, consectetur dolor. Praesent luctus id nibh quis dignissim. Nulla consectetur nisl nunc, tempus dictum augue imperdiet ut. Phasellus ligula erat, faucibus eu luctus sit amet, scelerisque sed arcu. Donec ante felis, eleifend ac neque eget, eleifend bibendum velit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas tincidunt, urna nec rutrum aliquam, arcu nisl scelerisque lacus, sit amet vestibulum neque massa ac elit. Cras vitae luctus purus, quis mollis ex. Nulla metus nisl, bibendum ac lacus ac, dapibus blandit mauris. Etiam in tempus risus.

Maecenas eleifend, lectus in cursus vehicula, mi nunc laoreet arcu, in congue sapien arcu in neque. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean justo enim, gravida sed sapien at, pharetra aliquam erat. Praesent id pulvinar orci. Quisque dictum et nulla non aliquet. Mauris aliquam massa sit amet nibh volutpat volutpat. Maecenas vitae tincidunt ligula. Aliquam ut pellentesque metus, et posuere urna. Vestibulum imperdiet sagittis neque a dignissim. Suspendisse vel ipsum sapien. In bibendum justo sed tortor venenatis, et hendrerit urna egestas.

Integer a ipsum egestas, rutrum ligula in, hendrerit erat. Nullam volutpat nibh ut augue bibendum tempus. Proin urna leo, aliquet gravida tempor ac, porta vitae erat. Aliquam ex risus, rhoncus vulputate dolor ut, aliquam feugiat nunc. Sed eu fringilla sapien, in tempor turpis. Morbi aliquet felis ut ligula dignissim tristique. Ut ut neque eu turpis mollis ullamcorper maximus vel urna.

Pellentesque vel malesuada arcu. Phasellus convallis urna a risus aliquam rutrum. In nulla ante, pulvinar at cursus ut, dictum et metus. Duis a nisl sed purus imperdiet aliquet id a nulla. Duis sit amet arcu sed sem hendrerit sodales. Integer interdum vehicula felis in pharetra. Cras id pretium nisl, ut convallis dolor. Pellentesque tristique massa elit, sit amet consectetur justo dignissim vel. Nunc vitae est eu nisi imperdiet posuere id at ipsum. Donec nec orci dictum, vehicula turpis sed, elementum leo. Donec pellentesque tortor at justo tempor sollicitudin. Mauris sit amet felis at mi luctus venenatis sit amet quis lacus. Maecenas scelerisque tellus nec lectus elementum dapibus. 

            </p>
        </div>
    </div>
    
</div>
    <div class="todo-container-footer">
        <span class="todo-new">+</span>
    </div>
</body>
</html> 