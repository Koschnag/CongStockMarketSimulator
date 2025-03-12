CREATE TABLE accounts (
    id SERIAL PRIMARY KEY,
    accountNumber VARCHAR(50) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL
);

INSERT INTO accounts (accountNumber, balance) VALUES ('12345', 1000.00);
INSERT INTO accounts (accountNumber, balance) VALUES ('67890', 2000.00);