# 🛒 Site e-commerce – Projet TPE

---

## **📌 Description du site**
Ce site e-commerce est une application web complète développée en **HTML, CSS, JavaScript, PHP et MySQL**.  
Il sert de **support pédagogique pour le TPE en Introduction au Génie Logiciel** et permet aux étudiants de pratiquer le **cycle de vie logiciel** (analyse, conception, tests, déploiement).

### **Fonctionnalités côté client**
- Navigation sur le catalogue de produits  
- Ajout de produits au panier  
- Passage et consultation de commandes  

### **Fonctionnalités côté administrateur**
- Gestion des commandes : consultation, suppression  
- Gestion des catégories et des produits : ajout, édition, suppression  
- Gestion des clients  
- Tableau de bord synthétique pour suivre l’activité

> 💡 **Conseil :** prendre des captures écran des pages client et admin pour le rapport TPE.

---

## **💻 Installation du site sur XAMPP**

### **Pré-requis**
- XAMPP installé (Apache + MySQL)  
- Accès à phpMyAdmin  

### **Étapes**
1. Cloner le dépôt GitHub :
```bash
git clone https://github.com/TON_COMPTE/nom-du-site.git

2. Copier le dossier ecommerce dans le répertoire htdocs de XAMPP :



C:\xampp\htdocs\ecommerce

3. Démarrer Apache et MySQL via XAMPP Control Panel


4. Ouvrir le site dans le navigateur : http://localhost/ecommerce




---

🗄 Installation de la base de données

1. Ouvrir phpMyAdmin : http://localhost/phpmyadmin/


2. Créer une base de données : ecommerce_db


3. Importer le fichier database.sql fourni


4. Vérifier que toutes les tables sont correctement créées



> ⚠️ Veiller à ce que le fichier config.php contienne les bons paramètres de connexion.



---

🔑 Connexion au panel admin

URL : http://localhost/ecommerce/admin/

Identifiant : admin

Mot de passe : admin


> 
Exemple de tableau de bord admin



---

📋 Recommandations pour le TPE

1. Planification / SDLC : organiser vos tâches sur Trello


2. Versioning / GitHub : créer votre propre dépôt, cloner le dépôt principal et effectuer des commits réguliers


3. Tests : vérifier toutes les fonctionnalités client/admin, contrôler la base de données


4. Déploiement : utiliser un hébergeur gratuit (InfinityFree, 000webhost), transférer les fichiers avec FileZilla


5. Documentation : inclure toutes les étapes (Trello, GitHub, tests, URL du site en ligne) dans le rapport final

---

📂 Structure du projet

ecommerce/
│
├─ index.html
├─ css/
│   └─ style.css
├─ js/
│   └─ script.js
├─ admin/
│   └─ index.php
├─ includes/
│   └─ config.php
├─ database.sql
└─ README.md


---

🖊 Auteur

M. Tchando Cladore, Ingénieur en Génie Logiciel
Projet réalisé pour l’unité Introduction au Génie Logiciel – 1ʳᵉ année


---

📜 Licence

Ce projet est fourni à des fins pédagogiques pour les étudiants de l’UE Introduction au Génie Logiciel.

---

💡 **Conseils supplémentaires pour GitHub :**
- Créer un dossier `images/` pour mettre vos captures écran client/admin  
- Ajouter un screenshot du tableau de bord dans `images/admin-dashboard.png`  
- Utiliser des **icônes emojis** pour rendre le README plus lisible et attractif  
- Vérifier que tous les chemins dans le site fonctionnent avec XAMPP
