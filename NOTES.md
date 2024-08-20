# LITTLE-SHOP

## Requirements

> Web app to manage a catalog of products from admin panel, create an authorization system to login as admin or common user. The common user can buy any available product, also the user can add a one or more products to car.

## USERS

> User types:
- admin
- common

> Attributes:
- id
- name
- email
- password
- profile_photo_path
- email_verification_at
- is_admin
- is_active

> Rules:
- To log in use email
- To log in the user must be active
- Automatic redirect by type of user
