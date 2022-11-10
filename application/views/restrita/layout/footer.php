        <!-- Função para exibir o footer nas views exceto Login -->
        <?php if ($this->router->fetch_class() != 'login') :?> 
            <footer class="main-footer">
                <div class="footer-left">
                </div>
                <div class="footer-right">
                    Desenvolvido por Thiago Moura - <script>document.write(new Date().getFullYear())</script>
                </div>
            </footer>
        <?php endif; ?>
            
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="<?PHP echo base_url('public/assets/js/app.min.js'); ?>"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="<?PHP echo base_url('public/assets/js/scripts.js'); ?>"></script>
    <!-- Custom JS File -->
    <script src="<?PHP echo base_url('public/assets/js/custom.js'); ?>"></script>

    <?php if (isset($scripts)) : ?>
        <?php foreach ($scripts as $script) : ?>
            <script src="<?PHP echo base_url("public/assets/{$script}"); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- JQuery para perguntar se deseja de fato executar ação em algum click de button -->
    <script>
        $('.delete').on("click", function(e) {
            event.preventDefault;
            var choice = confirm($(this).attr('data-confirm'));

            if (choice) {
                window.location.href = $(this).attr('href');
            }
        });
    </script>
</body>

</html>