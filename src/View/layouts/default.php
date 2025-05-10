<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'No title' ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="icon" type="image/png" href="/assets/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/assets/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Bitka" />
    <link rel="manifest" href="/assets/favicon/site.webmanifest" />

</head>

<body>

    <?= $content ?? 'content' ?>


    <script>
        class BitHeaderMobileMenu {
            constructor({
                navId,
                burgerId,
                overlayId
            }) {
                this.nav = document.getElementById(navId);
                this.burger = document.getElementById(burgerId);
                this.overlay = document.getElementById(overlayId);

                if (this.nav && this.burger && this.overlay) {
                    this.init();
                }
            }

            init() {
                this.burger.addEventListener('click', () => this.toggle());
                this.overlay.addEventListener('click', () => this.toggle());
            }

            toggle() {
                this.nav.classList.toggle('is-open');
                this.overlay.classList.toggle('is-active');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new BitHeaderMobileMenu({
                navId: 'nav',
                burgerId: 'burger',
                overlayId: 'overlay'
            });
        });
    </script>
</body>

</html>