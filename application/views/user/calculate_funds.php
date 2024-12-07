<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Funds</title>
    <?php $this->load->view('inc/user/user_styles'); ?>
</head>

<body>
    <div class="wrapper">
        <?php $this->load->view('inc/user/left_menu'); ?>
        <div class="page-wrapper">
            <?php $this->load->view('inc/user/header'); ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h3>Calculate Required Funds</h3>
                    <form method="POST" action="<?php echo base_url('user/calculate_funds'); ?>">
                        <!-- Country Selection -->
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required onchange="updateLocationOptions()">
                                <option value="UK">UK</option>
                                <option value="Australia">Australia</option>
                            </select>
                        </div>

                        <!-- Tuition Fee -->
                        <div class="form-group">
                            <label for="tuition_fee">Tuition Fee</label>
                            <input type="number" class="form-control" id="tuition_fee" name="tuition_fee" required>
                        </div>

                        <!-- Deposit Paid -->
                        <div class="form-group">
                            <label for="deposit_paid">Deposit Paid</label>
                            <input type="number" class="form-control" id="deposit_paid" name="deposit_paid" required>
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location">Location</label>
                            <select class="form-control" id="location" name="location" required>
                                <option value="inside_london">Inside London</option>
                                <option value="outside_london">Outside London</option>
                            </select>
                        </div>

                        <!-- Number of Dependents -->
                        <div class="form-group">
                            <label for="dependents">Number of Dependents</label>
                            <input type="number" class="form-control" id="dependents" name="dependents" required>
                        </div>

                        <!-- Number of Children -->
                        <div class="form-group">
                            <label for="children">Number of Children</label>
                            <input type="number" class="form-control" id="children" name="children" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Calculate</button>
                    </form>

                    <!-- Display Results -->
                    <?php if (isset($funds)): ?>
                        <div class="mt-4">
                            <h4>Calculation Results:</h4>
                            <p>Tuition Balance: <?php echo $funds['tuition_balance']; ?></p>
                            <p>Living Costs: <?php echo $funds['living_costs']; ?></p>
                            <?php if (isset($funds['schooling_cost'])): ?>
                                <p>Schooling Costs: <?php echo $funds['schooling_cost']; ?></p>
                            <?php endif; ?>
                            <?php if (isset($funds['travel_cost'])): ?>
                                <p>Travel Costs: <?php echo $funds['travel_cost']; ?></p>
                            <?php endif; ?>
                            <p>Total Funds Required: <?php echo $funds['total_funds']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Scripts -->
    <?php $this->load->view('inc/user/user_scripts'); ?>

    <!-- Dynamic Location Options -->
    <script>
        function updateLocationOptions() {
            const country = document.getElementById('country').value;
            const locationSelect = document.getElementById('location');

            // Clear existing options
            locationSelect.innerHTML = '';

            if (country === 'UK') {
                // UK Location Options
                locationSelect.innerHTML = `
                    <option value="inside_london">Inside London</option>
                    <option value="outside_london">Outside London</option>
                `;
            } else if (country === 'Australia') {
                // Australia Location Options
                locationSelect.innerHTML = `
                    <option value="inside_australia">Inside Australia</option>
                    <option value="outside_australia">Outside Australia</option>
                `;
            }
        }
    </script>
</body>

</html>
