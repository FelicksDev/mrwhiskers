<?php 
namespace App\Filters;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

use Illuminate\Support\Facades\Auth;


class RoleMenuFilter implements FilterInterface
{
	public function transform($item)
	{	
		if(Auth::check()||Auth::guard('administrador')->check()){
			
//Auth::guard('administrador')->user()->getRole()
if (! $this->isVisible($item)) {
	return false;
}

if (isset($item['header'])) {
	$item = $item['header'];
}

return $item;

		}

	}

	protected function isVisible($item)
	{
		/*if (isset($item['roles'])) {
			if (! (Auth::user())->hasAnyRole($item['roles'])) {
				// not a member of any valid roles; check if user has been granted explicit permission
				if (isset($item['can']) && (Auth::user())->can($item['can'])) {
					return true;
				} else {
					return false;
				}
			} else {
				return true;
			}
		} else {
			// valid roles not defined; check if user has been granted explicit permission
			if (isset($item['can'])) {
				// permissions are defined
				if ((Auth::user())->can($item['can'])) {
					return true;
				} else {
					return false;
				}
			} else {
				// no valid roles or permissions defined; allow for all users
				return true;
			}
		}*/
        // check if user is a member of specified role(s) 
		/* if(Auth::check() ){
			if (isset($item['roles'])) {
				if (! (Auth::user())->hasAnyRole($item['roles'])) {
					//dd(Auth::user()->hasAnyRole());
					// not a member of any valid roles; check if user has been granted explicit permission
					if (isset($item['can']) && (Auth::user())->can($item['can'])) {
						return true;
					} else {
						return false;
					}
				} else {
					return true;
				}
			} else {
				// valid roles not defined; check if user has been granted explicit permission
				if (isset($item['can'])) {
					// permissions are defined
					if ((Auth::user())->can($item['can'])) {
						return true;
					} else {
						return false;
					}
				} else {
					// no valid roles or permissions defined; allow for all users
					return true;
				}
			}
		} */

//PARA MULTISUARIO
/* if (Auth::check()) {
	dd(Auth::check());
    $user = Auth::user();
    $defaultGuardRole = $user; // obtiene el rol del usuario para el guard por defecto
	dd($defaultGuardRole);
}

// Verificar si el usuario está autenticado con el guard "administrador"
if (Auth::guard('administrador')->check()) {
	dd(Auth::guard('administrador')->check()); //retorna false
    $adminUser = Auth::guard('administrador')->user();
    $adminRole = $adminUser; // obtiene el rol del usuario para el guard "administrador"
	dd($adminRole);
} */
		 if (!Auth::guard('administrador')->check() && !Auth::check()) {
			//dd(Auth::getDefaultDriver());;
			return false;
		}
		//dd(Auth::user());
		//dd(Auth::guard('administrador')->user());
		//dd(Auth::guard()->user());
		// Get the current guard name
		
		//$guardName = Auth::getDefaultDriver();
		//dd($guardName);
		//dd(Auth::guard('administrador')->check());
		 if (Auth::guard('administrador')->check()){
			$guardName = Auth::guard('administrador')->user()->getGuard();
		}
		elseif (Auth::check()){
			$guardName = Auth::user()->getGuard();;
		}
 
		
		// Determine which method to use based on the guard name
		if ($guardName == 'administrador') {
			$user = Auth::guard('administrador')->user();
		} elseif($guardName == 'web') {
			$user = Auth::user();
		}
	
		// Check if user is a member of specified role(s)
		if (isset($item['roles'])) {
			if (!$user->hasAnyRole($item['roles'])) {
				// not a member of any valid roles; check if user has been granted explicit permission
				if (isset($item['can']) && $user->can($item['can'])) {
					return true;
				} else {
					return false;
				}
			} else {
				return true;
			}
		} else {
			//dd($user);
			// valid roles not defined; check if user has been granted explicit permission
			if (isset($item['can'])) {
				// permissions are defined
				if ($user->can($item['can'])) {
					return true;
				} else {
					return false;
				}
			} else {
				// no valid roles or permissions defined; allow for all users
				return true;
			}
		} 


		
	}
}

?>