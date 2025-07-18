-- Konfigursasi Menu : 

CREATE TABLE CONFIG_MENU
(
  MENU_ID Integer NOT NULL,
  MENU_TYPE Varchar(20),
  MENU_NAME Varchar(50) NOT NULL,
  MENU_DESC Varchar(250),
  MENU_SEQUENCE Integer,
  MENU_PARENT Integer,
  MENU_ROUTE Varchar(250),
  MENU_ICON Varchar(250),
  MENU_STATUS Varchar(1),
  CREATED_DT Timestamp NOT NULL,
  CREATED_BY Varchar(15) NOT NULL,
  LAST_UPDATED_DT Timestamp,
  LAST_UPDATED_BY Varchar(15),
  PRIMARY KEY (MENU_ID)
);
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON CONFIG_MENU TO  DBADMIN WITH GRANT OPTION;
GRANT DELETE, INSERT, SELECT, UPDATE
 ON CONFIG_MENU TO  DBUSER;
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON CONFIG_MENU TO  SYSDBA WITH GRANT OPTION;


-- Konfigurasi Role :
CREATE TABLE CONFIG_ROLE
(
  ROLE_ID Integer NOT NULL,
  ROLE_TYPE Varchar(20),
  ROLE_CATEGORY Varchar(20),
  ROLE_NAME Varchar(50) NOT NULL,
  ROLE_DESC Varchar(250),
  ROLE_STATUS Varchar(1),
  CREATED_DT Timestamp NOT NULL,
  CREATED_BY Varchar(15) NOT NULL,
  LAST_UPDATED_DT Timestamp,
  LAST_UPDATED_BY Varchar(15),
  CONSTRAINT CONFIG_ROLE_PK PRIMARY KEY (ROLE_ID)
);
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON CONFIG_ROLE TO  DBADMIN WITH GRANT OPTION;
GRANT DELETE, INSERT, SELECT, UPDATE
 ON CONFIG_ROLE TO  DBUSER;
GRANT DELETE, INSERT, REFERENCES, SELECT, UPDATE
 ON CONFIG_ROLE TO  SYSDBA WITH GRANT OPTION;