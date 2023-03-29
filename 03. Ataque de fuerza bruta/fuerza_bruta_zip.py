import zipfile

archivo_zip = 'Instrucciones.zip'
lista_de_contrasenas = [
    '123456', 'password', '123456789', '12345678', '12345', '1234567',
    '1234567890', 'qwerty', 'abc123', '111111', '123123', 'admin', 'letmein',
    'welcome', 'monkey', '654321', '1q2w3e4r', '666666', '555555', '7777777',
    '888888', '999999', '1234', '123456789a', 'superman', 'iloveyou',
    'sunshine', 'perritosLoveDogs123', '123456789z', '987654321'
]

def descomprimir_zip(archivo_zip, contrasena):
    try:
        with zipfile.ZipFile(archivo_zip, 'r') as zf:
            zf.extractall(pwd=bytes(contrasena, 'utf-8'))
            return True
    except RuntimeError:
        return False

def fuerza_bruta(archivo_zip, lista_de_contrasenas):
    for contrasena in lista_de_contrasenas:
        if descomprimir_zip(archivo_zip, contrasena):
            print(f'¡Contraseña encontrada!: {contrasena}')
            break
    else:
        print('No se pudo encontrar la contraseña.')

if __name__ == '__main__':
    fuerza_bruta(archivo_zip, lista_de_contrasenas)
