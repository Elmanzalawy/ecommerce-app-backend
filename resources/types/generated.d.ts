declare namespace App.Dto {
export type Product = {
id: number;
name: string;
description: string | null;
price: number;
discount_price: number | null;
currency: string;
is_active: boolean;
stock: number;
images: Array<string> | null;
};
}
