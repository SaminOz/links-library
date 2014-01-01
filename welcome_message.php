<?=$header?>
<body>

<div id="container">
    <h1>Welcome to CodeIgniter with Links Library!</h1>

    <div id="body">
        <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

        <p>If you would like to edit this page you'll find it located at:</p>
        <code>application/views/welcome_message.php</code>

        <p>The corresponding controller for this page is found at:</p>
        <code>application/controllers/welcome.php</code>

        <p>The following css files have been loaded by Links Library between the &lt;head/&gt; tags</p>
        <code>
            <?php foreach ($this->config->item('css') as $value): ?>
                <?=$value?>
            <?php endforeach ?>
        </code>
        <p>No javascript files were loaded by Links Library between the &lt;head/&gt; tags</p>
        <p>The following javascript files have been loaded by Links Library before the closing &lt;/body&gt; tag</p>
        <code>
            <?php foreach ($this->config->item('javascript_footer') as $value): ?>
                <?=$value?>
            <?php endforeach ?>
        </code>
        <p>To inspect the http requests use the network tab in Firebug Firefox or Inspect Element in Chrome</p>
        <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<?=$footer?>