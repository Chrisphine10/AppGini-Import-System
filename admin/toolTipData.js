var FiltersEnabled = 0; // if your not going to use transitions or filters in any of the tips set this to 0
var spacer="&nbsp; &nbsp; &nbsp; ";

// email notifications to admin
notifyAdminNewMembers0Tip=["", spacer+"No email notifications to admin."];
notifyAdminNewMembers1Tip=["", spacer+"Notify admin only when a new member is waiting for approval."];
notifyAdminNewMembers2Tip=["", spacer+"Notify admin for all new sign-ups."];

// visitorSignup
visitorSignup0Tip=["", spacer+"If this option is selected, visitors will not be able to join this group unless the admin manually moves them to this group from the admin area."];
visitorSignup1Tip=["", spacer+"If this option is selected, visitors can join this group but will not be able to sign in unless the admin approves them from the admin area."];
visitorSignup2Tip=["", spacer+"If this option is selected, visitors can join this group and will be able to sign in instantly with no need for admin approval."];

// contacts table
contacts_addTip=["",spacer+"This option allows all members of the group to add records to the 'Contacts' table. A member who adds a record to the table becomes the 'owner' of that record."];

contacts_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Contacts' table."];
contacts_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Contacts' table."];
contacts_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Contacts' table."];
contacts_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Contacts' table."];

contacts_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Contacts' table."];
contacts_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Contacts' table."];
contacts_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Contacts' table."];
contacts_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Contacts' table, regardless of their owner."];

contacts_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Contacts' table."];
contacts_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Contacts' table."];
contacts_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Contacts' table."];
contacts_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Contacts' table."];

// shipping_db table
shipping_db_addTip=["",spacer+"This option allows all members of the group to add records to the 'Imports Database' table. A member who adds a record to the table becomes the 'owner' of that record."];

shipping_db_view0Tip=["",spacer+"This option prohibits all members of the group from viewing any record in the 'Imports Database' table."];
shipping_db_view1Tip=["",spacer+"This option allows each member of the group to view only his own records in the 'Imports Database' table."];
shipping_db_view2Tip=["",spacer+"This option allows each member of the group to view any record owned by any member of the group in the 'Imports Database' table."];
shipping_db_view3Tip=["",spacer+"This option allows each member of the group to view all records in the 'Imports Database' table."];

shipping_db_edit0Tip=["",spacer+"This option prohibits all members of the group from modifying any record in the 'Imports Database' table."];
shipping_db_edit1Tip=["",spacer+"This option allows each member of the group to edit only his own records in the 'Imports Database' table."];
shipping_db_edit2Tip=["",spacer+"This option allows each member of the group to edit any record owned by any member of the group in the 'Imports Database' table."];
shipping_db_edit3Tip=["",spacer+"This option allows each member of the group to edit any records in the 'Imports Database' table, regardless of their owner."];

shipping_db_delete0Tip=["",spacer+"This option prohibits all members of the group from deleting any record in the 'Imports Database' table."];
shipping_db_delete1Tip=["",spacer+"This option allows each member of the group to delete only his own records in the 'Imports Database' table."];
shipping_db_delete2Tip=["",spacer+"This option allows each member of the group to delete any record owned by any member of the group in the 'Imports Database' table."];
shipping_db_delete3Tip=["",spacer+"This option allows each member of the group to delete any records in the 'Imports Database' table."];

/*
	Style syntax:
	-------------
	[TitleColor,TextColor,TitleBgColor,TextBgColor,TitleBgImag,TextBgImag,TitleTextAlign,
	TextTextAlign,TitleFontFace,TextFontFace, TipPosition, StickyStyle, TitleFontSize,
	TextFontSize, Width, Height, BorderSize, PadTextArea, CoordinateX , CoordinateY,
	TransitionNumber, TransitionDuration, TransparencyLevel ,ShadowType, ShadowColor]

*/

toolTipStyle=["white","#00008B","#000099","#E6E6FA","","images/helpBg.gif","","","","\"Trebuchet MS\", sans-serif","","","","3",400,"",1,2,10,10,51,1,0,"",""];

applyCssFilter();
