DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `id`
    integer
    NOT
    NULL /*!40101 AUTO_INCREMENT */,
    `nom`
    varchar
(
    40
),
    `prenom` varchar
(
    40
),
    `login` varchar
(
    30
) NOT NULL UNIQUE,
    `mdp` varchar
(
    60
) NOT NULL,
    `type` varchar
(
    5
) NOT NULL DEFAULT 'user',
    check
(
    type
    in
(
    'user',
    'admin',
    'cook'
)),
    PRIMARY KEY
(
    `id`
)
    ) /*!40101 AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 */;

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `mdp`, `type`)
VALUES ('1', 'Admin', 'User', 'admin', '$2y$10$OgGilVcpTrARPRsrx8YZf.GRCGW3EAugei7htlwYaGDdbROVRY2pu', 'admin'),
       ('2', 'Cook', 'user', 'cook', '$2y$10$/gM6HwqNSQFvY9DNc9dZWeQXHOd2nR4iFmJYNj1NNO2Tb2R.5RD5a', 'cook');


DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE IF NOT EXISTS `pizzas`
(
    `id`
    integer
    NOT
    NULL /*!40101 AUTO_INCREMENT */,
    `nom`
    varchar
(
    30
) NOT NULL,
    `description` text NOT NULL,
    `prix` decimal
(
    5,
    2
) NOT NULL,
    `created_at` datetime,
    `updated_at` datetime,
    `deleted_at` datetime,
    PRIMARY KEY
(
    `id`
)
    ) /*!40101 AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 */;

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes`
(
    `id`
    integer
    NOT
    NULL /*!40101 AUTO_INCREMENT */,
    `user_id`
    integer
    NOT
    NULL,
    `statut`
    varchar
(
    10
) NOT NULL,
    `created_at` datetime,
    `updated_at` datetime,
    CHECK
(
    statut
    IN
(
    'envoye',
    'traitement',
    'pret',
    'recupere'
)),
    FOREIGN KEY
(
    `user_id`
) REFERENCES `users`
(
    `id`
),
    PRIMARY KEY
(
    `id`
)
    ) /*!40101 AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 */;

DROP TABLE IF EXISTS `commande_pizza`;
CREATE TABLE IF NOT EXISTS `commande_pizza`
(
    `commande_id`
    integer
    NOT
    NULL,
    `pizza_id`
    integer
    NOT
    NULL,
    `qte`
    integer
    DEFAULT
    1
    NOT
    NULL,
    FOREIGN
    KEY
(
    `commande_id`
) REFERENCES `commandes`
(
    `id`
),
    FOREIGN KEY
(
    `pizza_id`
) REFERENCES `pizzas`
(
    `id`
),
    PRIMARY KEY
(
    `commande_id`,
    `pizza_id`
)
    ) /*!40101 DEFAULT CHARSET=utf8mb4 */;

