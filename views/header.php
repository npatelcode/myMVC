<html>
    <head>
        <title><?php echo $this->title; ?></title>
        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo "<script type='text/javascript' src=".URL."views/{$js}></script>";
            }
        }
        ?>
    </head>
    <body>
        <div id='header'>
            <a href='index'>Home</a> | 
            <a href='services'>Services</a> | 
            <a href='contact'>Contact Us</a> | 
        </div>
        <div id='content'>