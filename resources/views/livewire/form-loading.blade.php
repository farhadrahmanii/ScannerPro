<div>
    <style>
        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Skeleton Container */
        .skeleton-container {
            width: 100%;
            max-width: 1400px;
            margin: 40px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Skeleton Animation */
        @keyframes shimmer {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: 200px 0;
            }
        }

        .skeleton-line,
        .skeleton-input,
        .skeleton-button {
            background: #e0e0e0;
            background-image: linear-gradient(to right, #e0e0e0 0%, #f0f0f0 50%, #e0e0e0 100%);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite linear;
            border-radius: 4px;
        }

        /* Form Input Styles */
        .skeleton-input {
            height: 40px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .skeleton-line {
            height: 12px;
            margin-bottom: 10px;
            width: 100%;
        }

        .skeleton-line.short {
            width: 40%;
        }

        .skeleton-line.medium {
            width: 60%;
        }

        /* Form Layout */
        .form-row {
            display: flex;
            gap: 30px;
            margin-bottom: 20px;
        }

        .form-column {
            flex: 1;
        }

        /* Label Styles */
        .skeleton-label {
            width: 80%;
            height: 5px;
            margin-bottom: 8px;
            margin-top: 5px;
        }

        /* Button Styles */
        .skeleton-button {
            width: 100%;
            height: 45px;
            margin-top: 20px;
            border-radius: 4px;
        }
    </style>

    <div>
        <div class="skeleton-container">
            <!-- Form Placeholder -->
            <div class="form-row">
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
            </div>

            <div class="form-row">
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
                <div class="form-column">
                    <div class="skeleton-label"></div> <!-- Label -->
                    <div class="skeleton-input"></div> <!-- Input Field -->
                </div>
            </div>

            <!-- Save Button -->
            <div class="skeleton-button"></div> <!-- Save Button -->
        </div>
    </div>
</div>