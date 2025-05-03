<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'No title' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="bitka">
    {{header}}
    <div class="content">
        <?= $content ?? 'content' ?>
    </div>
    {{footer}}

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