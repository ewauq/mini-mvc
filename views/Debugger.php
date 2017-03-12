<?php if(count($debugger_output) > 0): ?>
    <div id="debugger">
        <h1>Debugger</h1>
        <ol>
            <?php foreach ($debugger_output as $line => $message): ?>
                    <?php echo '<li>' . $message . '</li>'; ?>
            <?php endforeach; ?>
        </ol>

    </div>
<?php endif; ?>
