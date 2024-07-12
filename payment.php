<!DOCTYPE html>
<html>

<head>
    <style>
        form {
            width: 30%;
            background-color: lightgray;
        }

        form h2 {
            text-align: center;
        }

        .form {
            display: flex;
            justify-content: flex-end;
        }

        .form label {
            text-align: left;
        }

        #i {
            align-items: center;
        }
    </style>
    <title>Payment Form</title>
    <link rel="stylesheet" href="styles/payment_method.css">
</head>

<body>

    <form action="payment-php.php" method="post" onsubmit="return validateForm()">
        <h1>Payment Form</h1>
        <div class="form"><label for="name">Username</label><input type="text" id="name" name="name" required><br><br>
        </div>
        <div class="form"><label for="email">Email</label><input type="email" id="email" name="email" required><br><br>
        </div>
        <div class="form"><label for="card_number">Card Number</label><input type="text" id="card_number"
                name="card_number" required><br><br></div>
        <div class="form"><label for="exp_date">Expiry Date</label><input type="text" id="exp_date" name="exp_date"
                placeholder="MM/YYYY" required> <br><br></div>
        <div class="form"><label for="cvv">CVV</label><input type="text" id="cvv" name="cvv" required><br><br></div>
        <div class="form"><label for="amount">Amount</label><input type="text" id="amount" name="amount"
                required><br><br></div>
        <div style="margin-left:180px;"><img src="images/payment.png" alt="" width="50%"><br>
            <input type="submit" class="submit" name="submit" value="Pay Now" id="i"></div>

    </form>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var cardNumber = document.getElementById('card_number').value;
            var expDate = document.getElementById('exp_date').value;
            var cvv = document.getElementById('cvv').value;
            var amount = document.getElementById('amount').value;

            // Validation checks
            if (name.trim() == "") {
                alert("Please enter your username.");
                return false;
            }
            if (email.trim() == "") {
                alert("Please enter your email.");
                return false;
            }
            if (!validateEmail(email)) {
                alert("Please enter a valid email address.");
                return false;
            }
            if (cardNumber.trim() == "") {
                alert("Please enter your card number.");
                return false;
            }
            if (expDate.trim() == "") {
                alert("Please enter the expiry date.");
                return false;
            }
            if (cvv.trim() == "") {
                alert("Please enter the CVV.");
                return false;
            }
            if (amount.trim() == "") {
                alert("Please enter the amount.");
                return false;
            }

            // Add more specific validation checks if needed

            return true; // If all validations pass, return true to submit the form
        }

        // Function to validate email address format
        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
    </script>
</body>

</html>
