<?PHP

class Admin_Information extends Com_Module_Information {

    public function init() {

        $obj = get('userType');
        if ($obj == 1) {
            
        }
        // Com_Helper_Menu::getInstance()->add("Dashboard", "/Admin/Admin", "Dashboard", "th-large",null);
        // Com_Helper_Menu::getInstance()->add("Statistics", "/Admin/Statistics", "Estad&iacute;sticas", "stats",null);

        /**
         * Menu Contenido
         */
        Com_Helper_Menu::getInstance()->add("Content", null, "Opciones", "globe");
        Com_Helper_Menu::getInstance()->add("Menu", "/Admin/Menu", "Menu", "menu", "Content");
        Com_Helper_Menu::getInstance()->add("Texts", "/Admin/Texts", "Textos", "texts", "Content");
        Com_Helper_Menu::getInstance()->add("Pages", "/Admin/Pages", "P&aacute;ginas", "pages", "Content");
        Com_Helper_Menu::getInstance()->add("Links", "/Admin/Links", "Links", "Links", "Content");
        Com_Helper_Menu::getInstance()->add("Servicios", "/Admin/Services", "Servicios", "Servicios", "Content");
        Com_Helper_Menu::getInstance()->add("Trabajo", "/Admin/Works", "Trabajos", "Trabajos", "Content");
        Com_Helper_Menu::getInstance()->add("Equipo", "/Admin/Teams", "Equipo", "Equipo", "Content");
        Com_Helper_Menu::getInstance()->add("Noticias", "/Admin/Notes", "Noticias", "Noticias", "Content");
        Com_Helper_Menu::getInstance()->add("Slides", "/Admin/SlideShows", "Slides", "Slides", "Content");



        /**
         * Menu Notas
         */
       // Com_Helper_Menu::getInstance()->add("Notes", null, "Notas", "pencil");
       // Com_Helper_Menu::getInstance()->add("Categorias", "/Admin/Categories", "Categorias", "Categorias", "Notes");
        Com_Helper_Menu::getInstance()->add("Item", "/Admin/Notes", "Items", "Item", "Notes");
        
       

        /**
         * Menu Administracion
         */
        Com_Helper_Menu::getInstance()->add("Administration", null, "Administraci&oacute;n", "cog");
        Com_Helper_Menu::getInstance()->add("Contact", "/Admin/Contact", "Contacto", "contact", "Administration");
        Com_Helper_Menu::getInstance()->add("Users", "/Admin/Users", "Usuarios", "users", "Administration");
      //  Com_Helper_Menu::getInstance()->add("Languages", "/Admin/Language", "Idiomas", "languages", "Administration");
        Com_Helper_Menu::getInstance()->add("Configurations", "/Admin/Configurations", "Configuraciones", "configurations", "Administration");
    }

}
