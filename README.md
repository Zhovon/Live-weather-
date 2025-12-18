# Live Weather Widget for Elementor

A lightweight, custom Elementor widget that displays real-time weather data for any city. Built with PHP, JavaScript (Fetch API), and the OpenWeatherMap API.

![Version](https://img.shields.io/badge/version-1.1.0-blue)
![WordPress](https://img.shields.io/badge/WordPress-6.0+-21759b)
![Elementor](https://img.shields.io/badge/Elementor-3.0+-9b27b0)
![License](https://img.shields.io/badge/license-GPLv2-green)

## 🚀 Features

* **Real-Time Data:** Fetches current temperature, weather condition, and city info via OpenWeatherMap API.
* **Elementor Native:** Fully integrated into the Elementor editor interface.
* **Custom Styling:**
    * **Card Styling:** Control background (classic/gradient), borders, shadows, and padding via Elementor's "Style" tab.
    * **Typography:** Full control over font family, size, weight, and colors for City, Temp, and Description.
    * **Responsive:** Adjust alignment and padding for Desktop, Tablet, and Mobile.
* **High-Quality Icons:** Dynamically loads high-resolution (`@4x`) weather icons with a floating animation.
* **Zero Dependencies:** No heavy libraries (jQuery is used only for Elementor hooks).

## 🛠️ Installation

1.  **Download:** Clone this repository or download the ZIP.
    ```bash
    git clone [https://github.com/Zhovon/Live-weather-.git](https://github.com/Zhovon/Live-weather-.git)
    ```
2.  **Upload:**
    * **ZIP:** Compress the `elementor-live-weather` folder and upload via WordPress Admin > Plugins > Add New.
    * **Manual:** Upload the folder to `/wp-content/plugins/`.
3.  **Activate:** Activate the **"Elementor Live Weather"** plugin. (Requires Elementor to be active).

## ⚙️ Configuration

1.  **Get API Key:** Sign up at [OpenWeatherMap](https://openweathermap.org/api) and generate a free API Key.
2.  **Add Widget:** Open any page in Elementor and search for **"Live Weather"**.
3.  **Setup:**
    * Drag the widget to the page.
    * Paste your **API Key**.
    * Enter a **City Name** (e.g., *Dhaka* or *London*).
4.  **Style:** Switch to the **Style** tab to customize colors and layout.

## 💻 Tech Stack

* **PHP:** Widget registration and backend controls.
* **JavaScript (ES6):** Asynchronous `fetch()` requests to handle API data without page reloads.
* **CSS3:** Custom animations and responsive layout.
* **Elementor API:** `Widget_Base` class extension.

## 📝 Author

**Zhovon**
* Portfolio: [zhovon.com](https://zhovon.com)
* GitHub: [@Zhovon](https://github.com/Zhovon)

---
*Note: This widget is a portfolio demonstration. For high-security enterprise environments, it is recommended to proxy API requests through a WordPress REST endpoint to hide the API key.*