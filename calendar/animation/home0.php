<html>

<body>
    <script>
        function create_2d_array(rows, columns) {
            return Array.from({
                length: rows
            }, () => Array(columns).fill(null)); // Create an empty array using Array.from
        }

        // Set entry point coordinates (example values)
        const entry_point_x = 3;
        const entry_point_y = 5;

        function get_user_input(prompt) {
            return parseInt(prompt(prompt)); // Get user input and convert to integer
        }

        const user_x = get_user_input("Enter your x coordinate: ");
        const user_y = get_user_input("Enter your y coordinate: ");

        let direction = "";

        if (user_x > entry_point_x) {
            direction = "right";
        } else if (user_x < entry_point_x) {
            direction = "left";
        } else {
            if (user_y > entry_point_y) {
                direction = "down";
            } else {
                direction = "up";
            }
        }

        console.log("Go", direction, "to reach your home.");
    </script>
</body>

</html>