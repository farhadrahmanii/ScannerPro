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
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
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
        .skeleton-avatar {
            background: #e0e0e0;
            background-image: linear-gradient(to right, #e0e0e0 0%, #f0f0f0 50%, #e0e0e0 100%);
            background-size: 200px 100%;
            animation: shimmer 1.5s infinite linear;
            border-radius: 4px;
        }

        /* Top Section */
        .skeleton-top {
            display: flex;
            gap: 20px;
            margin-bottom: 16px;
        }

        .skeleton-avatar {
            width: 80px;
            height: 80px;
            border-radius: 8px;
        }

        .skeleton-lines {
            flex: 1;
        }

        .skeleton-line {
            height: 12px;
            margin-bottom: 10px;
            width: 100%;
        }

        .skeleton-line.short {
            width: 30%;
        }

        .skeleton-line.medium {
            width: 50%;
        }

        /* Separator */
        .skeleton-separator {
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }

        /* Details Section */
        .skeleton-details {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .skeleton-column {
            flex: 1;
        }

        /* Table Placeholder */
        .skeleton-table {
            width: 100%;
            border-collapse: collapse;
        }

        .skeleton-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .skeleton-row.header {
            background-color: #f0f0f0;
            height: 20px;
            border-radius: 8px;

        }

        .skeleton-row .skeleton-line {
            flex: 1;
            height: 12px;
            margin: 0 5px;
        }
    </style>
    <div>
        <div class="skeleton-container">
            <!-- Top Section -->
            <!-- Horizontal Separator -->
            <!-- Details Section -->
            <!-- <div class="skeleton-details">
                <div class="skeleton-column">
                    <div class="skeleton-line medium"></div>
                    <div class="skeleton-line short"></div>
                    <div class="skeleton-line medium"></div>
                    <div class="skeleton-line short"></div>
                </div>
                <div class="skeleton-column">
                    <div class="skeleton-line medium"></div>
                    <div class="skeleton-line short"></div>
                    <div class="skeleton-line medium"></div>
                    <div class="skeleton-line short"></div>
                </div>
            </div> -->

            <!-- Table Placeholder -->
            <br>
            <div class="skeleton-table">
                <div class="skeleton-row header">
                </div>
                <div class="skeleton-row ">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
                <div class="skeleton-row">
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                    <div class="skeleton-line"></div>
                </div>
            </div>
        </div>
    </div>
</div>