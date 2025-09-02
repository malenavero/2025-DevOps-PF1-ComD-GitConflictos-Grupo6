## 2025 DevOps - PF1 : Conflictos en Git

_Grupo 6_
_Comisión D_ 
**Seminario de Actualización DevOps** 

---
### Integrantes

- Josefina Cicchini
- Rosana Cohen
- Francisco Agustín Cruz Guantay
- Malena Guardia Vero

---

**Año:** 2025
**IFTS 29**


---

### Documentación de la llamada al backend

#### Endpoint
- **URL:** `backend.php`  

#### Método
- **HTTP Method:** `POST`  

#### Formato de envío
- **Content-Type:** `application/json`  
- Los datos se envían en el **body** de la petición.  

#### Parámetros enviados
- `usuario` → string → nombre de usuario escrito en el formulario  
- `password` → string → contraseña escrita en el formulario  

Ejemplo de **JSON enviado**:
```json
{
  "usuario": "juan23",
  "password": "123456"
}
```

