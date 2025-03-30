<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST['principal'];
    $rate = $_POST['rate'] / 100;
    $time = $_POST['time'];
    
    $finalAmount = $principal * pow(1 + $rate, $time);
    $result = number_format($finalAmount, 2);
} else {
    $principal = 1000;
    $rate = 2.1;
    $time = 30;
    $result = "";
}
?><!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compound Interest Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, button { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 5px; }
        button { background-color: #007BFF; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Compound Interest Calculator</h2>
        <form method="POST">
            <label>Principal ($)</label>
            <input type="number" name="principal" value="<?php echo $principal; ?>" required><label>Daily Rate (%)</label>
        <input type="number" name="rate" step="0.01" value="<?php echo $rate; ?>" required>
        
        <label>Time (Days)</label>
        <input type="number" name="time" value="<?php echo $time; ?>" required>
        
        <button type="submit">Calculate</button>
    </form>
    
    <?php if ($result !== ""): ?>
        <h3>Final Amount: $<?php echo $result; ?></h3>
    <?php endif; ?>
</div>

</body>
</html>
