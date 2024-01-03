DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users`
(
    `id`
    integer
    NOT
    NULL /*!40101 AUTO_INCREMENT */,
    `login`
    varchar
(
    30
) NOT NULL,
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
    'admin'
)),
    PRIMARY KEY
(
    `id`
)
    ) /*!40101  ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 */;
